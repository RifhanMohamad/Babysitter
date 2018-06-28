package com.bitp3453.babysitter.activities;

import android.content.Context;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.text.Editable;
import android.text.TextWatcher;
import android.util.Log;
import android.view.View;
import android.widget.ArrayAdapter;
import android.widget.AutoCompleteTextView;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Toast;

import com.android.volley.AuthFailureError;
import com.android.volley.DefaultRetryPolicy;
import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.RetryPolicy;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;
import com.bitp3453.babysitter.R;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.ArrayList;
import java.util.HashMap;
import java.util.Map;

public class Booking extends AppCompatActivity implements TextWatcher {

    AutoCompleteTextView mAuto;
    String mURL="http://192.168.0.100/BabysitterAndroid/auto.php";
    Context mContext;
    String TAG=MainActivity.class.getSimpleName();
    String mName;
    ArrayList<String> mCountryList;
    ArrayAdapter mAdapter;

    EditText b_name,phone_num,email,num_of_child,child_cat;
    Button save;
    String url = "http://192.168.0.100/BabysitterAndroid/insert.php";

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_booking);
        mContext=Booking.this;
        mCountryList=new ArrayList<>();
        mAuto=findViewById(R.id.auto_tv);
        mAdapter=new ArrayAdapter(mContext,android.R.layout.simple_dropdown_item_1line, mCountryList);
        mName=mAuto.getText().toString();
        mAuto.addTextChangedListener(this);

        loadData();


        b_name= (EditText) findViewById(R.id.b_name);
        phone_num= (EditText) findViewById(R.id.phone_num);
        email= (EditText) findViewById(R.id.email);
        num_of_child= (EditText) findViewById(R.id.num_of_child);
        child_cat= (EditText) findViewById(R.id.child_cat);
        save = (Button) findViewById(R.id.save);

        save.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                final String nurName= mAuto.getText().toString();
                final String bookName= b_name.getText().toString();
                final String phoneNum= phone_num.getText().toString();
                final String useremail= email.getText().toString();
                final String numChild= num_of_child.getText().toString();
                final String childCat= child_cat.getText().toString();

                RequestQueue queue = Volley.newRequestQueue(Booking.this);
                StringRequest request = new StringRequest(Request.Method.POST, url, new Response.Listener<String>() {
                    @Override
                    public void onResponse(String response) {

                        Toast.makeText(Booking.this, "Successfully booked!"+response, Toast.LENGTH_SHORT).show();
                        Log.i("My success",""+response);

                    }
                }, new Response.ErrorListener() {
                    @Override
                    public void onErrorResponse(VolleyError error) {

                        Toast.makeText(Booking.this, "my error :"+error, Toast.LENGTH_LONG).show();
                        Log.i("My error",""+error);
                    }
                }){
                    @Override
                    protected Map<String, String> getParams() throws AuthFailureError {

                        Map<String,String> map = new HashMap<String, String>();
                        map.put("nur_name",nurName);
                        map.put("b_name",bookName);
                        map.put("phone_num",phoneNum);
                        map.put("email",useremail);
                        map.put("num_of_child",numChild);
                        map.put("child_cat",childCat);


                        return map;
                    }
                };
                queue.add(request);

            }
        });

    }

    private void loadData() {
        RequestQueue requestQueue= Volley.newRequestQueue(mContext);
        StringRequest stringRequest=new StringRequest(Request.Method.GET, mURL, new Response.Listener<String>() {
            @Override
            public void onResponse(String response) {
                Log.e(TAG, "onResponse: " +response);
                try{
                    JSONObject jsonObject=new JSONObject(response);

                    JSONArray jsonArray=jsonObject.getJSONArray("Nursery");
                    for(int i=0;i<jsonArray.length();i++){
                        JSONObject jsonObject1=jsonArray.getJSONObject(i);
                        Log.e(TAG, "onResponse: " +jsonObject1.getString("n_name") );
                        mCountryList.add(jsonObject1.getString("n_name"));

                    }
                    mAuto.setThreshold(1);
                    mAuto.setAdapter(mAdapter);

                }

                catch (JSONException e){e.printStackTrace();}
            }
        }, new Response.ErrorListener() {
            @Override
            public void onErrorResponse(VolleyError error) {
                error.printStackTrace();
            }
        });
        int socketTimeout = 30000;
        RetryPolicy policy = new DefaultRetryPolicy(socketTimeout, DefaultRetryPolicy.DEFAULT_MAX_RETRIES, DefaultRetryPolicy.DEFAULT_BACKOFF_MULT);
        stringRequest.setRetryPolicy(policy);
        requestQueue.add(stringRequest);
    }


    @Override
    public void beforeTextChanged(CharSequence charSequence, int i, int i1, int i2) {

    }

    @Override
    public void onTextChanged(CharSequence charSequence, int i, int i1, int i2) {
    }

    @Override
    public void afterTextChanged(Editable editable) {

    }
}
