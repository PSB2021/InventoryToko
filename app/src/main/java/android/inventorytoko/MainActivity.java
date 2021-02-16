package android.inventorytoko;

import android.content.DialogInterface;
import android.os.AsyncTask;
import android.os.Bundle;
import android.support.v7.app.AlertDialog;
import android.support.v7.app.AppCompatActivity;
import android.text.TextUtils;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ArrayAdapter;
import android.widget.Button;
import android.widget.EditText;
import android.widget.ListView;
import android.widget.ProgressBar;
import android.widget.Spinner;
import android.widget.TextView;
import android.widget.Toast;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.ArrayList;
import java.util.HashMap;
import java.util.List;

import static android.view.View.GONE;

public class MainActivity extends AppCompatActivity {

    private static final int CODE_GET_REQUEST = 1024;
    private static final int CODE_POST_REQUEST = 1025;

    EditText editTexId, editTextNama, editTextMerk, editTextJumlah;
    Spinner spinertempat;
    ProgressBar progressBar;
    ListView listView;
    Button buttonAddUpdate;

    List<Hero> heroList;

    boolean isUpdating = false;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
       progressBar = (ProgressBar) findViewById(R.id.progressBar);
        listView = (ListView) findViewById(R.id.listViewHeroes);

        heroList = new ArrayList<>();



        readHeroes();
    }


    private void createHero() {
        String nama = editTextNama.getText().toString().trim();
        String merek = editTextMerk.getText().toString().trim();

        String  jumlah= editTextJumlah.getText().toString().trim();

        String tempat = spinertempat.getSelectedItem().toString();

        if (TextUtils.isEmpty(nama)) {
            editTextNama.setError("Please enter name");
            editTextNama.requestFocus();
            return;
        }

        if (TextUtils.isEmpty(merek)) {
            editTextMerk.setError("Please enter merek");
            editTextMerk.requestFocus();
            return;
        }
        if (TextUtils.isEmpty(jumlah)) {
            editTextJumlah.setError("Please enter Jumlah");
            editTextJumlah.requestFocus();
            return;
        }

        HashMap<String, String> params = new HashMap<>();
        params.put("nama", nama);
        params.put("merek", merek);
        params.put("jumlah", jumlah);
        params.put("tempat", tempat);

        PerformNetworkRequest request = new PerformNetworkRequest(Api.URL_CREATE_HERO, params, CODE_POST_REQUEST);
        request.execute();
    }

    private void readHeroes() {
        PerformNetworkRequest request = new PerformNetworkRequest(Api.URL_READ_HEROES, null, CODE_GET_REQUEST);
        request.execute();
    }

    private void updateHero() {
        String id = editTexId.getText().toString();
        String nama = editTextNama.getText().toString().trim();
        String merek = editTextMerk.getText().toString().trim();
        String jumlah = editTextJumlah.getText().toString();
        String tempat = spinertempat.getSelectedItem().toString();


        if (TextUtils.isEmpty(nama)) {
            editTextNama.setError("Please enter name");
            editTextNama.requestFocus();
            return;
        }

        if (TextUtils.isEmpty(merek)) {
            editTextMerk.setError("Please enter merek");
            editTextMerk.requestFocus();
            return;
        }
        if (TextUtils.isEmpty(jumlah)) {
            editTextJumlah.setError("Please enter Jumlah");
            editTextJumlah.requestFocus();
            return;
        }

        HashMap<String, String> params = new HashMap<>();
        params.put("id",id);
        params.put("nama", nama);
        params.put("merek", merek);
        params.put("jumlah", jumlah);
        params.put("tempat", tempat);


        PerformNetworkRequest request = new PerformNetworkRequest(Api.URL_UPDATE_HERO, params, CODE_POST_REQUEST);
        request.execute();

        buttonAddUpdate.setText("Add");

        editTextNama.setText("");
        editTextMerk.setText("");
        editTextJumlah.setText("");
        spinertempat.setSelection(0);

        isUpdating = false;
    }

    private void deleteHero(int id) {
        PerformNetworkRequest request = new PerformNetworkRequest(Api.URL_DELETE_HERO + id, null, CODE_GET_REQUEST);
        request.execute();
    }

    private void refreshHeroList(JSONArray heroes) throws JSONException {
        heroList.clear();

        for (int i = 0; i < heroes.length(); i++) {
            JSONObject obj = heroes.getJSONObject(i);

            heroList.add(new Hero(
                    obj.getInt("id"),
                    obj.getString("nama"),
                    obj.getString("merek"),
                    obj.getString("jumlah"),
                    obj.getString("tempat")
            ));
        }

        HeroAdapter adapter = new HeroAdapter(heroList);
        listView.setAdapter(adapter);
    }

    private class PerformNetworkRequest extends AsyncTask<Void, Void, String> {
        String url;
        HashMap<String, String> params;
        int requestCode;

        PerformNetworkRequest(String url, HashMap<String, String> params, int requestCode) {
            this.url = url;
            this.params = params;
            this.requestCode = requestCode;
        }

        @Override
        protected void onPreExecute() {
            super.onPreExecute();
            progressBar.setVisibility(View.VISIBLE);
        }

        @Override
        protected void onPostExecute(String s) {
            super.onPostExecute(s);
            progressBar.setVisibility(GONE);
            try {
                JSONObject object = new JSONObject(s);
                if (!object.getBoolean("error")) {
                    Toast.makeText(getApplicationContext(), object.getString("message"), Toast.LENGTH_SHORT).show();
                    refreshHeroList(object.getJSONArray("heroes"));
                }
            } catch (JSONException e) {
                e.printStackTrace();
            }
        }

        @Override
        protected String doInBackground(Void... voids) {
            RequestHandler requestHandler = new RequestHandler();

            if (requestCode == CODE_POST_REQUEST)
                return requestHandler.sendPostRequest(url, params);


            if (requestCode == CODE_GET_REQUEST)
                return requestHandler.sendGetRequest(url);

            return null;
        }
    }

    class HeroAdapter extends ArrayAdapter<Hero> {
        List<Hero> heroList;

        public HeroAdapter(List<Hero> heroList) {
            super(MainActivity.this, R.layout.layout_hero_list, heroList);
            this.heroList = heroList;
        }


        @Override
        public View getView(int position, View convertView, ViewGroup parent) {
            LayoutInflater inflater = getLayoutInflater();
            View listViewItem = inflater.inflate(R.layout.layout_hero_list, null, true);

            TextView textViewName = listViewItem.findViewById(R.id.textViewName);
            TextView textViewMerek = listViewItem.findViewById(R.id.textViewmerek);
            TextView textViewJumlah = listViewItem.findViewById(R.id.textViewjumlah);
            TextView textViewTempat = listViewItem.findViewById(R.id.textViewtempat);


            final Hero hero = heroList.get(position);

            textViewName.setText(hero.getNama());
            textViewMerek.setText(hero.getMerek());
            textViewJumlah.setText(hero.getJumlah());
            textViewTempat.setText(hero.getTempat());


            return listViewItem;
        }
    }
}

