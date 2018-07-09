package faciltrabajo.utec.faciltrabajo.Activities;

import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;

import com.android.volley.Request;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.VolleyLog;
import com.android.volley.toolbox.JsonObjectRequest;

import org.json.JSONException;
import org.json.JSONObject;

import faciltrabajo.utec.faciltrabajo.Application.AppConfig;
import faciltrabajo.utec.faciltrabajo.Application.AppController;
import faciltrabajo.utec.faciltrabajo.Helpers.SQLiteHandler;
import faciltrabajo.utec.faciltrabajo.Helpers.SessionManager;
import faciltrabajo.utec.faciltrabajo.R;
import faciltrabajo.utec.faciltrabajo.Repositories.ToolsRepository;

public class SignInActivity extends AppCompatActivity {

    private EditText edtCorreo;
    private EditText edtPassword;
    private Button btnSignIn;
    private Button btnSignUp;

    ToolsRepository repository = new ToolsRepository();
    AppConfig appConfig = new AppConfig();

    private SessionManager session;
    private SQLiteHandler db;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_sign_in);

        btnSignIn = findViewById(R.id.btnSignIn);
        btnSignUp = findViewById(R.id.btnSignUp);
        edtCorreo = findViewById(R.id.edtCorreo);
        edtPassword = findViewById(R.id.edtPassword);

        // SQLite database handler
        db = new SQLiteHandler(getApplicationContext());

        // Session manager
        session = new SessionManager(getApplicationContext());

        // Check if user is already logged in or not
        if (session.isLoggedIn()) {
            // User is already logged in. Take him to main activity
            Intent intent = new Intent(getApplicationContext(),MainActivity.class);
            startActivity(intent);
            finish();
        }

        btnSignIn.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view){
                // Revisa si hay conexion a Internet
                if(!repository.IsNetworkAvailable(SignInActivity.this)){
                    repository.ToastMessage(SignInActivity.this,"Verifica tu conexion a Internet.");
                }
                else {
                    if(ValidaDatos(edtCorreo,edtPassword)){
                        repository.ProgressDialogStart(SignInActivity.this,"Iniciando sesion....");

                        // Crea una solicitud HTTP para validar el usuario y password ingresado.
                        JsonObjectRequest jsonObjReq = new JsonObjectRequest(Request.Method.POST,
                                appConfig.UrlSignIn(edtCorreo.getText().toString(),edtPassword.getText().toString()), null, new Response.Listener<JSONObject>() {

                            @Override
                            public void onResponse(JSONObject response) {
                                try {
                                    if(response.getJSONObject("usuario").getInt("total") > 0){
                                        session.setLogin(true);
                                        db.addUser(response.getJSONObject("usuario").getInt("idUsuario"),
                                                response.getJSONObject("usuario").getString("nombres"),
                                                response.getJSONObject("usuario").getString("apellidos"),
                                                response.getJSONObject("usuario").getString("correo"));
                                        repository.ProgressDialogDismiss();
                                        Intent intent = new Intent(getApplicationContext(),MainActivity.class);
                                        intent.setFlags(intent.getFlags() | Intent.FLAG_ACTIVITY_NO_HISTORY);
                                        startActivity(intent);
                                    }else{
                                        repository.ProgressDialogDismiss();
                                        repository.AlertDialogOk(SignInActivity.this,"Error","Credenciales no validas");
                                    }

                                } catch (JSONException e) {
                                    e.printStackTrace();
                                    repository.ToastMessage(SignInActivity.this,"Error, intentelo de nuevo");
                                    repository.ProgressDialogDismiss();
                                }
                            }
                        }, new Response.ErrorListener() {

                            @Override
                            public void onErrorResponse(VolleyError error) {
                                VolleyLog.d("tag", "Error: " + error.getMessage());
                                repository.ToastMessage(SignInActivity.this,"Error mientras se procesaba la informacion....");
                                repository.ProgressDialogDismiss();
                            }
                        });
                        // Agrega la solicitud para solicitar cola
                        AppController.getInstance(SignInActivity.this).addToRequestQueue(jsonObjReq);
                    }
                }
            }
        });

        btnSignUp.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                startActivity(new Intent(SignInActivity.this, SignUpActivity.class));
            }
        });
    }

    @Override
    public void onBackPressed() {
        super.onBackPressed();
        this.finish();
    }

    private boolean ValidaDatos(EditText edtCorreo,EditText edtPassword){
        boolean datos = true;
        if(edtCorreo.getText().toString().length() == 0){
            edtCorreo.requestFocus();
            edtCorreo.setError("Ingrese el correo electronico");
            datos = false;
        }
        if(edtPassword.getText().toString().length() == 0){
            edtPassword.requestFocus();
            edtPassword.setError("Ingrese su contraseña");
            datos = false;
        }
        return datos;
    }
}
