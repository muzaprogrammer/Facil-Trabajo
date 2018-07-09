package faciltrabajo.utec.faciltrabajo.Activities;

import android.content.Intent;
import android.graphics.Color;
import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.support.v7.widget.Toolbar;
import android.text.Html;
import android.view.MenuItem;
import android.view.View;
import android.widget.Button;
import android.widget.TextView;

import com.android.volley.Request;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.VolleyLog;
import com.android.volley.toolbox.JsonObjectRequest;

import org.json.JSONException;
import org.json.JSONObject;

import java.util.HashMap;

import faciltrabajo.utec.faciltrabajo.Application.AppConfig;
import faciltrabajo.utec.faciltrabajo.Application.AppController;
import faciltrabajo.utec.faciltrabajo.Helpers.SQLiteHandler;
import faciltrabajo.utec.faciltrabajo.Helpers.SessionManager;
import faciltrabajo.utec.faciltrabajo.R;
import faciltrabajo.utec.faciltrabajo.Repositories.ToolsRepository;

import static java.lang.Integer.parseInt;

public class DetallesOfertaActivity extends AppCompatActivity {

    private TextView tvCargoPuesto;
    private TextView tvEmpresa;
    private TextView tvFechaPublicacion;
    private TextView tvLugarContratacion;
    private TextView tvNumeroVacantes;
    private TextView tvDetallesSalario;
    private TextView tvDescripcion;
    private Button btnPostular;
    private SQLiteHandler db;

    private int idOfertaG,idUsuarioG;
    ToolsRepository repository = new ToolsRepository();
    AppConfig appConfig = new AppConfig();
    // Fetching user details from SQLite

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_detalles_oferta);
        Toolbar toolbar = (Toolbar) findViewById(R.id.toolbar);
        setSupportActionBar(toolbar);

        // add back arrow to toolbar
        if (getSupportActionBar() != null) {
            getSupportActionBar().setDisplayHomeAsUpEnabled(true);
            getSupportActionBar().setDisplayShowHomeEnabled(true);
        }

        // SQLite database handler
        db = new SQLiteHandler(getApplicationContext());
        HashMap<String, String> user = db.getUserDetails();
        int idUsuario = parseInt(user.get("idUsuario"));
        int idOferta = getIntent().getIntExtra("idOfertaTrabajo",0);
        idOfertaG = idOferta;
        idUsuarioG = idUsuario;

        repository.ProgressDialogStart(DetallesOfertaActivity.this,"Cargando los datos...");

        tvCargoPuesto = findViewById(R.id.tvCargoPuesto);
        tvEmpresa = findViewById(R.id.tvEmpresa);
        tvFechaPublicacion = findViewById(R.id.tvFechaPublicacion);
        tvLugarContratacion = findViewById(R.id.tvLugarContratacion);
        tvNumeroVacantes = findViewById(R.id.tvNumeroVacantes);
        tvDetallesSalario = findViewById(R.id.tvDetallesSalario);
        tvDescripcion = findViewById(R.id.tvDescripcion);
        btnPostular = findViewById(R.id.btnPostular);

        // Crea una solicitud HTTP para validar el usuario y password ingresado.
        JsonObjectRequest jsonObjReq = new JsonObjectRequest(Request.Method.GET,
                appConfig.UrlDetallesOferta(idOferta,idUsuario), null, new Response.Listener<JSONObject>() {

            @Override
            public void onResponse(JSONObject response) {
                try {
                    tvCargoPuesto.setText(response.getJSONObject("oferta").getString("cargoOferta"));
                    tvEmpresa.setText(response.getJSONObject("oferta").getString("nombreEmpresa"));
                    tvFechaPublicacion.setText(response.getJSONObject("oferta").getString("fechaPublicacion"));
                    tvLugarContratacion.setText(response.getJSONObject("oferta").getString("departamento"));
                    tvNumeroVacantes.setText(response.getJSONObject("oferta").getString("vacantes"));
                    tvDetallesSalario.setText("$" + response.getJSONObject("oferta").getString("salario"));
                    tvDescripcion.setText(Html.fromHtml(response.getJSONObject("oferta").getString("descripcion")));
                    if(response.getJSONObject("oferta").isNull("idPostulante")){
                        btnPostular.setEnabled(true);
                    }else{
                        btnPostular.setEnabled(false);
                        btnPostular.setText("Postulado");
                        btnPostular.setBackground(getResources().getDrawable(R.color.btn_logut_bg));
                    }
                    repository.ProgressDialogDismiss();
                } catch (JSONException e) {
                    e.printStackTrace();
                    repository.ToastMessage(DetallesOfertaActivity.this,"Error, intentelo de nuevo");
                    repository.ProgressDialogDismiss();
                }
            }
        }, new Response.ErrorListener() {

            @Override
            public void onErrorResponse(VolleyError error) {
                VolleyLog.d("tag", "Error: " + error.getMessage());
                repository.ToastMessage(DetallesOfertaActivity.this,"Error mientras se procesaba la informacion....");
                repository.ProgressDialogDismiss();
            }
        });
        // Agrega la solicitud para solicitar cola
        AppController.getInstance(DetallesOfertaActivity.this).addToRequestQueue(jsonObjReq);

        btnPostular.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                repository.ProgressDialogStart(DetallesOfertaActivity.this,"Procesando la peticion...");
                // Crea una solicitud HTTP para validar el usuario y password ingresado.
                JsonObjectRequest jsonObjReq = new JsonObjectRequest(Request.Method.GET,
                        appConfig.UrlPostulacion(idOfertaG,idUsuarioG), null, new Response.Listener<JSONObject>() {

                    @Override
                    public void onResponse(JSONObject response) {
                        try {
                            if(response.getJSONObject("mensaje").getString("respuesta").equals("0")){
                                btnPostular.setEnabled(false);
                                btnPostular.setText("Postulado");
                                btnPostular.setBackground(getResources().getDrawable(R.color.btn_logut_bg));
                                repository.ProgressDialogDismiss();
                                repository.AlertDialogOk(DetallesOfertaActivity.this,"Exito","Te has postulado a la oferta exitosamente!");
                            }else{
                                btnPostular.setEnabled(true);
                                repository.ProgressDialogDismiss();
                                repository.AlertDialogOk(DetallesOfertaActivity.this,"Error","Por favor intentalo nuevamente mas tarde!");
                            }
                        } catch (JSONException e) {
                            e.printStackTrace();
                            repository.ToastMessage(DetallesOfertaActivity.this,"Error, intentelo de nuevo");
                            repository.ProgressDialogDismiss();
                        }
                    }
                }, new Response.ErrorListener() {

                    @Override
                    public void onErrorResponse(VolleyError error) {
                        VolleyLog.d("tag", "Error: " + error.getMessage());
                        repository.ToastMessage(DetallesOfertaActivity.this,"Error mientras se procesaba la informacion....");
                        repository.ProgressDialogDismiss();
                    }
                });
                // Agrega la solicitud para solicitar cola
                AppController.getInstance(DetallesOfertaActivity.this).addToRequestQueue(jsonObjReq);
            }
        });
    }

    @Override
    public boolean onOptionsItemSelected(MenuItem item) {
        // handle arrow click here
        if (item.getItemId() == android.R.id.home) {
            finish(); // close this activity and return to preview activity (if there is any)
        }

        return super.onOptionsItemSelected(item);
    }

}
