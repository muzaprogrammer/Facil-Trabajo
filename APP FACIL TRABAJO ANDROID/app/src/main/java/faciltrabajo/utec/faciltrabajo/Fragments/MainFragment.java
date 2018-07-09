package faciltrabajo.utec.faciltrabajo.Fragments;

import android.content.Intent;
import android.os.Bundle;
import android.support.annotation.Nullable;
import android.support.v4.app.Fragment;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ArrayAdapter;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Spinner;

import faciltrabajo.utec.faciltrabajo.Activities.ResultadosActivity;
import faciltrabajo.utec.faciltrabajo.Application.AppConfig;
import faciltrabajo.utec.faciltrabajo.R;
import faciltrabajo.utec.faciltrabajo.Repositories.ToolsRepository;


public class MainFragment extends Fragment {

    private Spinner spnDepartamentos;
    private EditText edtCargoProfesion;
    private Button btnBuscarEmpleo;

    ToolsRepository repository = new ToolsRepository();
    AppConfig appConfig = new AppConfig();

    @Nullable
    @Override
    public View onCreateView(LayoutInflater inflater, @Nullable ViewGroup container, @Nullable Bundle savedInstanceState) {
        //returning our layout file
        //change R.layout.yourlayoutfilename for each of your fragments
        return inflater.inflate(R.layout.fragment_main, container, false);
    }

    @Override
    public void onViewCreated(View view, @Nullable Bundle savedInstanceState) {
        super.onViewCreated(view, savedInstanceState);

        spnDepartamentos  = getView().findViewById(R.id.spnDepartamentos);
        btnBuscarEmpleo = getView().findViewById(R.id.btnBuscarEmpleo);
        edtCargoProfesion = getView().findViewById(R.id.edtCargoProfesion);

        ArrayAdapter<CharSequence> adapter = ArrayAdapter.createFromResource(getActivity().getBaseContext(),
                R.array.spinner_departamentos, R.layout.custom_spinner);
        spnDepartamentos.setAdapter(adapter);

        btnBuscarEmpleo.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {

                Intent intent = new Intent(getActivity().getBaseContext(), ResultadosActivity.class);
                intent.putExtra("EXTRA_CARGO_PROFESION", edtCargoProfesion.getText().toString());
                intent.putExtra("EXTRA_DEPARTAMENTO",spnDepartamentos.getSelectedItem().toString());
                startActivity(intent);
            }
        });

    }
}