package faciltrabajo.utec.faciltrabajo.Activities;

import android.app.AlertDialog;
import android.content.DialogInterface;
import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.text.Editable;
import android.text.TextWatcher;
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
import faciltrabajo.utec.faciltrabajo.R;
import faciltrabajo.utec.faciltrabajo.Repositories.ToolsRepository;

public class SignUpActivity extends AppCompatActivity {

    ToolsRepository repository = new ToolsRepository();
    AppConfig appConfig = new AppConfig();

    /** CREACION DE LOS ELEMENTOS **/
    Button btnSignIn;
    Button btnSignUp;

    EditText edtNombres;
    EditText edtApellidos;
    EditText edtEmail;
    EditText edtPassword;
    EditText edtPasswordConfirm;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_sign_up);

        /** INICIALIZACION DE LOS ELEMENTOS **/
        btnSignIn = findViewById(R.id.btnLinkToSignInScreen);
        btnSignUp = findViewById(R.id.btnSignUp);
        edtNombres = findViewById(R.id.edtNombres);
        edtApellidos = findViewById(R.id.edtApellidos);
        edtEmail = findViewById(R.id.edtCorreo);
        edtPassword = findViewById(R.id.edtPassword);
        edtPasswordConfirm = findViewById(R.id.edtPasswordConfirm);

        btnSignIn.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v){
                Intent intent = new Intent(getApplicationContext(),SignInActivity.class);
                intent.setFlags(intent.getFlags() | Intent.FLAG_ACTIVITY_NO_HISTORY);
                startActivity(intent);
                finish();
            }
        });

        btnSignUp.setOnClickListener(new View.OnClickListener(){
            @Override
            public void onClick(View v){
                if(ValidaDatos(edtNombres,edtApellidos,edtEmail,edtPassword)){
                    if(!edtPassword.getText().toString().equals(edtPasswordConfirm.getText().toString())){
                        edtPasswordConfirm.requestFocus();
                        edtPasswordConfirm.setError("Las contraseña no son iguales");
                    }else{
                        repository.ProgressDialogStart(SignUpActivity.this,"Procesando la informacion ....");

                        // Crea una solicitud HTTP para validar el usuario y password ingresado.
                        JsonObjectRequest jsonObjReq = new JsonObjectRequest(Request.Method.POST,
                                appConfig.UrlSignUp(edtNombres.getText().toString(),edtApellidos.getText().toString(),edtEmail.getText().toString(),edtPassword.getText().toString()), null, new Response.Listener<JSONObject>() {

                            @Override
                            public void onResponse(JSONObject response) {
                                try {
                                    if(response.getJSONObject("mensaje").getBoolean("resultado") == true){
                                        repository.ProgressDialogDismiss();
                                        AlertDialog.Builder builder = new AlertDialog.Builder(SignUpActivity.this);
                                        builder.setCancelable(true);
                                        builder.setTitle("Exito");
                                        builder.setMessage("Cuenta creada exitosamente!");
                                        builder.setPositiveButton("Aceptar",
                                                new DialogInterface.OnClickListener() {
                                                    @Override
                                                    public void onClick(DialogInterface dialog, int which) {
                                                        Intent intent = new Intent(getApplicationContext(),SignInActivity.class);
                                                        startActivity(intent);
                                                        finish();
                                                    }
                                                });
                                        AlertDialog dialog = builder.create();
                                        dialog.show();
                                    }else{
                                        repository.ProgressDialogDismiss();
                                        repository.AlertDialogOk(SignUpActivity.this,"Error","El correo electronico ingresado ya esta siendo utilizado.");
                                    }

                                } catch (JSONException e) {
                                    e.printStackTrace();
                                    repository.ToastMessage(SignUpActivity.this,"Error, intentelo de nuevo");
                                    repository.ProgressDialogDismiss();
                                }
                            }
                        }, new Response.ErrorListener() {

                            @Override
                            public void onErrorResponse(VolleyError error) {
                                VolleyLog.d("tag", "Error: " + error.getMessage());
                                repository.ToastMessage(SignUpActivity.this,"Error mientras se procesaba la informacion....");
                                repository.ProgressDialogDismiss();
                            }
                        });
                        // Agrega la solicitud para solicitar cola
                        AppController.getInstance(SignUpActivity.this).addToRequestQueue(jsonObjReq);
                    }
                }
            }
        });
    }

    private boolean ValidaDatos(EditText edtNombres,EditText edtApellidos, EditText edtEmail, EditText edtPassword){
        boolean datos = true;
        if(edtNombres.getText().toString().length() == 0){
            edtNombres.requestFocus();
            edtNombres.setError("El nombre no puede ser vacio");
            datos = false;
        }
        if(edtApellidos.getText().toString().length() == 0){
            edtApellidos.requestFocus();
            edtApellidos.setError("El apellido no puede ser vacio");
            datos = false;
        }
        if(edtEmail.getText().toString().length() == 0){
            edtEmail.requestFocus();
            edtEmail.setError("El correo electronico no puede ser vacio");
            datos = false;
        }
        if(edtPassword.getText().toString().length() == 0){
            edtPassword.requestFocus();
            edtPassword.setError("La contraseña no puede ser vacia");
            datos = false;
        }

        if(edtPassword.getText().length() <= 5){
            edtPassword.requestFocus();
            edtPassword.setError("La contraseña debe contener al menos 6 caracteres");
            datos = false;
        }

        if(!datos){
            repository.AlertDialogOk(SignUpActivity.this,"Error","Por favor complete los campos necesarios...");
        }
        return datos;
    }
}
