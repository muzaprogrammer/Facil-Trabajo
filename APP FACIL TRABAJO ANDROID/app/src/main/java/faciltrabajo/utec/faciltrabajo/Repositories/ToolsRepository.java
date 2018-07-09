package faciltrabajo.utec.faciltrabajo.Repositories;
import android.app.ProgressDialog;
import android.content.Context;
import android.content.DialogInterface;
import android.net.ConnectivityManager;
import android.support.v7.app.AlertDialog;
import android.widget.Toast;

/**
 * Created by Ricardo on 11/21/2017.
 */

public class ToolsRepository {
    ProgressDialog progressDoalog;

    public void ProgressDialogStart(final Context context, String mensaje){
        progressDoalog = new ProgressDialog(context);
        progressDoalog.setMessage(mensaje);
        progressDoalog.setProgressStyle(ProgressDialog.STYLE_SPINNER);
        progressDoalog.setCancelable(false);
        progressDoalog.show();
    }

    public void ProgressDialogDismiss(){
        progressDoalog.dismiss();
    }

    public void ToastMessage(final Context context,String mensaje){
        Toast.makeText(context, mensaje,
                Toast.LENGTH_LONG).show();
    }

    public boolean IsNetworkAvailable(final Context context) {
        final ConnectivityManager connectivityManager = ((ConnectivityManager) context.getSystemService(Context.CONNECTIVITY_SERVICE));
        return connectivityManager.getActiveNetworkInfo() != null && connectivityManager.getActiveNetworkInfo().isConnected();
    }

    public void AlertDialogOk(final Context context,String titulo, String mensaje){
        AlertDialog.Builder builder = new AlertDialog.Builder(context);
        builder.setCancelable(true);
        builder.setTitle(titulo);
        builder.setMessage(mensaje);
        builder.setPositiveButton("Aceptar",
                new DialogInterface.OnClickListener() {
                    @Override
                    public void onClick(DialogInterface dialog, int which) {
                    }
                });
        AlertDialog dialog = builder.create();
        dialog.show();
    }
}
