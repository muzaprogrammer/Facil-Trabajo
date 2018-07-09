package faciltrabajo.utec.faciltrabajo.Helpers;

import android.app.Activity;
import android.content.Context;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.BaseAdapter;
import android.widget.TextView;

import java.util.List;

import faciltrabajo.utec.faciltrabajo.R;

/**
 * Adaptador de leads
 */

public class OfertasAdapter extends BaseAdapter {

    private Activity activity;
    private LayoutInflater inflater;
    private List<OfertasDataSet> DataList;

    public OfertasAdapter(Activity activity, List<OfertasDataSet> billionairesItems) {
        this.activity = activity;
        this.DataList = billionairesItems;
    }

    @Override
    public int getCount() {
        return DataList.size();
    }

    @Override
    public Object getItem(int location) {
        return DataList.get(location);
    }

    @Override
    public long getItemId(int position) {
        return position;
    }

    @Override
    public View getView(int position, View convertView, ViewGroup parent) {

        if (inflater == null)
            inflater = (LayoutInflater) activity
                    .getSystemService(Context.LAYOUT_INFLATER_SERVICE);
        if (convertView == null)
            convertView = inflater.inflate(R.layout.list_item_oferta, null);

        TextView cargo = (TextView) convertView.findViewById(R.id.tvCargo);
        TextView empresa = (TextView) convertView.findViewById(R.id.tvEmpresa);
        TextView fecha = (TextView) convertView.findViewById(R.id.tvFecha);
        TextView lugar = (TextView) convertView.findViewById(R.id.tvLugar);
        TextView postulacion = (TextView) convertView.findViewById(R.id.tvPostulacion);

        OfertasDataSet m = DataList.get(position);

        cargo.setText(String.valueOf(m.getCargo()));
        empresa.setText(String.valueOf(m.getEmpresa()));
        fecha.setText(String.valueOf(m.getFecha()));
        lugar.setText(String.valueOf(m.getLugar()));
        postulacion.setText(String.valueOf(m.getPostulacion()));

        return convertView;
    }

}
