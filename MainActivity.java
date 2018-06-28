package com.bitp3453.babysitter.activities;

import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.support.v7.widget.LinearLayoutManager;
import android.support.v7.widget.RecyclerView;

import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.JsonArrayRequest;
import com.android.volley.toolbox.Volley;
import com.bitp3453.babysitter.R;
import com.bitp3453.babysitter.adapters.RecyclerViewAdapter;
import com.bitp3453.babysitter.model.Nursery;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.ArrayList;
import java.util.List;

public class MainActivity extends AppCompatActivity {

    private final String JSON_URL = "http://192.168.0.100/Babysitter/getdata.php";
    private JsonArrayRequest request;
    private RequestQueue requestQueue;
    private List<Nursery> listNursery;
    private RecyclerView recyclerView;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        //hide the default actionbar
        getSupportActionBar().hide();

        listNursery = new ArrayList<>();
        recyclerView = findViewById(R.id.recyclerviewid);
        jsonrequest();

    }

    private void jsonrequest() {
        request = new JsonArrayRequest(JSON_URL, new Response.Listener<JSONArray>() {
            @Override
            public void onResponse(JSONArray response) {

                JSONObject jsonObject = null;

                for (int i=0; i< response.length(); i++)
                {
                    try {
                        jsonObject = response.getJSONObject(i);
                        Nursery nursery = new Nursery();
                        nursery.setName(jsonObject.getString("n_name"));
                        nursery.setDescriptions(jsonObject.getString("description"));
                        nursery.setRatings(jsonObject.getString("rating"));
                        nursery.setCategories(jsonObject.getString("categorie"));
                        nursery.setLocation(jsonObject.getString("location"));
                        nursery.setImage_url(jsonObject.getString("img"));
                        listNursery.add(nursery);




                    } catch (JSONException e) {
                        e.printStackTrace();
                    }
                }

                setuprecycleview(listNursery);

            }
        }, new Response.ErrorListener() {
            @Override
            public void onErrorResponse(VolleyError error) {


            }
        });

        requestQueue = Volley.newRequestQueue(MainActivity.this);
        requestQueue.add(request);
    }

    private void setuprecycleview(List<Nursery> listNursery) {

        RecyclerViewAdapter myadapter = new RecyclerViewAdapter(this,listNursery);
        recyclerView.setLayoutManager(new LinearLayoutManager(this));

        recyclerView.setAdapter(myadapter);
    }
}
