package faciltrabajo.utec.faciltrabajo.Fragments;


import android.app.AlertDialog;
import android.content.Intent;
import android.os.Bundle;
import android.support.annotation.Nullable;
import android.support.v4.app.Fragment;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.AdapterView;
import android.widget.ListView;

import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.JsonArrayRequest;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.ArrayList;
import java.util.HashMap;
import java.util.List;

import faciltrabajo.utec.faciltrabajo.Activities.DetallesOfertaActivity;
import faciltrabajo.utec.faciltrabajo.Activities.ResultadosActivity;
import faciltrabajo.utec.faciltrabajo.Application.AppConfig;
import faciltrabajo.utec.faciltrabajo.Application.AppController;
import faciltrabajo.utec.faciltrabajo.Helpers.OfertasAdapter;
import faciltrabajo.utec.faciltrabajo.Helpers.OfertasDataSet;
import faciltrabajo.utec.faciltrabajo.Helpers.SQLiteHandler;
import faciltrabajo.utec.faciltrabajo.R;
import faciltrabajo.utec.faciltrabajo.Repositories.ToolsRepository;

import static java.lang.Integer.parseInt;

/**
 * A simple {@link Fragment} subclass.
 */
public class MisPostulacionesFragment extends Fragment {

    private ToolsRepository repository = new ToolsRepository();
    private AppConfig appConfig = new AppConfig();
    private SQLiteHandler db;
    private List<OfertasDataSet> list = new ArrayList<OfertasDataSet>();
    private ListView listView;
    private OfertasAdapter adapter;


    public MisPostulacionesFragment() {
        // Required empty public constructor
    }


    @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container,
                             Bundle savedInstanceState) {
        // Inflate the layout for this fragment
        return inflater.inflate(R.layout.fragment_mis_postulaciones, container, false);
    }

    @Override
    public void onViewCreated(View view, @Nullable Bundle savedInstanceState) {
        super.onViewCreated(view, savedInstanceState);

        repository.ProgressDialogStart(getActivity(),"Buscando empleos...");
        // SQLite database handler
        db = new SQLiteHandler(getActivity());

        listView = getView().findViewById(R.id.list);
        adapter = new OfertasAdapter(getActivity(), list);
        listView.setAdapter(adapter);

        HashMap<String, String> user = db.getUserDetails();
        int idUsuario = parseInt(user.get("idUsuario"));

        JsonArrayRequest billionaireReq = new JsonArrayRequest(appConfig.UrlBuscarPostulaciones(idUsuario),
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
                                    dataSet.setPostulacion(obj.getString("fechaPostulacion"));
                                    list.add(dataSet);

                                    repository.ProgressDialogDismiss();
                                } catch (JSONException e) {
                                    e.printStackTrace();
                                }

                            }
                            adapter.notifyDataSetChanged();
                        }else{
                            repository.ProgressDialogDismiss();
                            repository.AlertDialogOk(getActivity(),"Ops!","No hay datos para mostrar...");
                        }
                    }
                }, new Response.ErrorListener() {
            @Override
            public void onErrorResponse(VolleyError error) {
                repository.ProgressDialogDismiss();
                AlertDialog.Builder add = new AlertDialog.Builder(getActivity());
                add.setMessage(error.getMessage()).setCancelable(true);
                AlertDialog alert = add.create();
                alert.setTitle("Error!!!");
                alert.show();
            }
        });
        AppController.getInstance(getActivity()).addToRequestQueue(billionaireReq);

        listView.setOnItemClickListener(new AdapterView.OnItemClickListener() {
            @Override
            public void onItemClick(AdapterView<?> adapterView, View view, int position, long l) {
                OfertasDataSet currentOfertas = (OfertasDataSet) adapter.getItem(position);
                Intent intent = new Intent(getActivity(), DetallesOfertaActivity.class);
                intent.putExtra("idOfertaTrabajo",currentOfertas.getIdOfertaEmpleo());
                startActivity(intent);
            }
        });
    }
}
