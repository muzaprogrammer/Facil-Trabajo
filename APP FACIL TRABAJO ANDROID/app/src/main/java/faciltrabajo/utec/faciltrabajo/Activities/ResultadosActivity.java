package faciltrabajo.utec.faciltrabajo.Activities;

import android.app.AlertDialog;
import android.content.Intent;
import android.os.Bundle;
import android.support.design.widget.FloatingActionButton;
import android.support.design.widget.Snackbar;
import android.support.v7.app.AppCompatActivity;
import android.support.v7.widget.Toolbar;
import android.view.MenuItem;
import android.view.View;
import android.widget.AdapterView;
import android.widget.ListView;
import android.widget.TextView;
import android.widget.Toast;

import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.JsonArrayRequest;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.ArrayList;
import java.util.HashMap;
import java.util.List;

import faciltrabajo.utec.faciltrabajo.Application.AppConfig;
import faciltrabajo.utec.faciltrabajo.Application.AppController;
import faciltrabajo.utec.faciltrabajo.Helpers.OfertasAdapter;
import faciltrabajo.utec.faciltrabajo.Helpers.OfertasDataSet;
import faciltrabajo.utec.faciltrabajo.Helpers.SQLiteHandler;
import faciltrabajo.utec.faciltrabajo.R;
import faciltrabajo.utec.faciltrabajo.Repositories.ToolsRepository;

import static java.lang.Integer.parseInt;

public class ResultadosActivity extends AppCompatActivity {

    private static final String tag = MainActivity.class.getSimpleName();
    private List<OfertasDataSet> list = new ArrayList<OfertasDataSet>();
    private ListView listView;
    private OfertasAdapter adapter;
    private TextView mTitle;

    private ToolsRepository repository = new ToolsRepository();
    private AppConfig appConfig = new AppConfig();
    private SQLiteHandler db;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_resultados);
        Toolbar toolbar = (Toolbar) findViewById(R.id.toolbar);
        setSupportActionBar(toolbar);

        mTitle = (TextView) toolbar.findViewById(R.id.toolbar_title);
        mTitle.setText("Facil Trabajo");

        // SQLite database handler
        db = new SQLiteHandler(getApplicationContext());

        String cargo_profesion = getIntent().getStringExtra("EXTRA_CARGO_PROFESION");
        String departamento = getIntent().getStringExtra("EXTRA_DEPARTAMENTO");

        // add back arrow to toolbar
        if (getSupportActionBar() != null) {
            getSupportActionBar().setDisplayHomeAsUpEnabled(true);
            getSupportActionBar().setDisplayShowHomeEnabled(true);
        }

        repository.ProgressDialogStart(ResultadosActivity.this,"Buscando empleos...");

        listView = (ListView) findViewById(R.id.list);
        adapter = new OfertasAdapter(this, list);
        listView.setAdapter(adapter);

        HashMap<String, String> user = db.getUserDetails();
        int idUsuario = parseInt(user.get("idUsuario"));

        JsonArrayRequest billionaireReq = new JsonArrayRequest(appConfig.UrlBuscarOferta(cargo_profesion,departamento,idUsuario),
                new Response.Listener<JSONArray>() {
                    @Override
                    public void onResponse(JSONArray response) {
                        if(response.length() > 0){
                            for (int i = 0; i < response.length(); i++) {
                                try {

                                    JSONObject obj = response.getJSONObject(i);
                                    OfertasDataSet dataSet = new OfertasDataSet();

                                    dataSet.setIdOfertaEmpleo(obj.getInt("idofertasEmpleo"));
                                    dataSet.setEmpresa(obj.getString("nombreEmpresa"));
                                    dataSet.setCargo(obj.getString("cargoOferta"));
                                    dataSet.setFecha(obj.getString("fechaPublicacion"));
                                    dataSet.setLugar(obj.getString("departamento"));
                                    if(obj.isNull("idOfertaEmpleo")){
                                        dataSet.setPostulacion("");
                                    }else{
                                        dataSet.setPostulacion("Postulado");
                                    }

                                    list.add(dataSet);

                                    repository.ProgressDialogDismiss();
                                } catch (JSONException e) {
                                    e.printStackTrace();
                                }

                            }
                            adapter.notifyDataSetChanged();
                        }else{
                            repository.ProgressDialogDismiss();
                            repository.AlertDialogOk(ResultadosActivity.this,"Ops!","No hay datos para mostrar...");
                        }

                    }
                }, new Response.ErrorListener() {
            @Override
            public void onErrorResponse(VolleyError error) {
                repository.ProgressDialogDismiss();
                AlertDialog.Builder add = new AlertDialog.Builder(ResultadosActivity.this);
                add.setMessage(error.getMessage()).setCancelable(true);
                AlertDialog alert = add.create();
                alert.setTitle("Error!!!");
                alert.show();
            }
        });
        AppController.getInstance(ResultadosActivity.this).addToRequestQueue(billionaireReq);

        listView.setOnItemClickListener(new AdapterView.OnItemClickListener() {
            @Override
            public void onItemClick(AdapterView<?> adapterView, View view, int position, long l) {
                OfertasDataSet currentOfertas = (OfertasDataSet) adapter.getItem(position);
                Intent intent = new Intent(getApplicationContext(), DetallesOfertaActivity.class);
                intent.putExtra("idOfertaTrabajo",currentOfertas.getIdOfertaEmpleo());
                startActivity(intent);
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