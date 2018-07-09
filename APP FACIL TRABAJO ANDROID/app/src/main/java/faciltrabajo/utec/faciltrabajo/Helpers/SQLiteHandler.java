package faciltrabajo.utec.faciltrabajo.Helpers;

/**
 * Created by Ricardo on 11/25/2017.
 */

import android.content.ContentValues;
import android.content.Context;
import android.database.Cursor;
import android.database.sqlite.SQLiteDatabase;
import android.database.sqlite.SQLiteOpenHelper;

import java.util.HashMap;

public class SQLiteHandler extends SQLiteOpenHelper {

    // All Static variables
    // Database Version
    private static final int DATABASE_VERSION = 1;

    // Database Name
    private static final String DATABASE_NAME = "facil_trabajo";

    // Login table name
    private static final String TABLE_USER = "usuario";

    // Login Table Columns names
    private static final String KEY_ID = "idUsuario";
    private static final String KEY_NAME = "nombres";
    private static final String KEY_LAST_NAME = "apellidos";
    private static final String KEY_EMAIL = "correo";

    public SQLiteHandler(Context context) {
        super(context, DATABASE_NAME, null, DATABASE_VERSION);
    }

    // Creating Tables
    @Override
    public void onCreate(SQLiteDatabase db) {
        String CREATE_LOGIN_TABLE = "CREATE TABLE " + TABLE_USER + "("
                + KEY_ID + " INTEGER," + KEY_NAME + " TEXT,"
                + KEY_LAST_NAME + " TEXT," + KEY_EMAIL + " TEXT UNIQUE" + ")";
        db.execSQL(CREATE_LOGIN_TABLE);

    }

    // Upgrading database
    @Override
    public void onUpgrade(SQLiteDatabase db, int oldVersion, int newVersion) {
        // Drop older table if existed
        db.execSQL("DROP TABLE IF EXISTS " + TABLE_USER);
        // Create tables again
        onCreate(db);
    }

    /**
     * Storing user details in database
     * */
    public void addUser(Integer idUsuario,String name,String lastName, String email) {
        SQLiteDatabase db = this.getWritableDatabase();
        ContentValues values = new ContentValues();
        values.put(KEY_ID, idUsuario);
        values.put(KEY_NAME, name);
        values.put(KEY_LAST_NAME, lastName);
        values.put(KEY_EMAIL, email);

        // Inserting Row
        long id = db.insert(TABLE_USER, null, values);
        db.close(); // Closing database connection
    }

    /**
     * Getting user data from database
     * */
    public HashMap<String, String> getUserDetails() {
        HashMap<String, String> user = new HashMap<String, String>();
        String selectQuery = "SELECT * FROM " + TABLE_USER;

        SQLiteDatabase db = this.getReadableDatabase();
        Cursor cursor = db.rawQuery(selectQuery, null);
        // Move to first row
        cursor.moveToFirst();
        if (cursor.getCount() > 0) {
            user.put("idUsuario", cursor.getString(0));
            user.put("nombres", cursor.getString(1));
            user.put("apellidos", cursor.getString(2));
            user.put("correo", cursor.getString(3));
            int x= 0;
        }
        cursor.close();
        db.close();
        // return user
        return user;
    }

    /**
     * Re crate database Delete all tables and create them again
     * */
    public void deleteUsers() {
        SQLiteDatabase db = this.getWritableDatabase();
        // Delete All Rows
        db.delete(TABLE_USER, null, null);
        db.close();
    }

}
