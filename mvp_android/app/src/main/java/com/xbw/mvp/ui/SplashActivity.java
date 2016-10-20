package com.xbw.mvp.ui;

import android.app.Activity;
import android.content.Context;
import android.content.Intent;
import android.graphics.BitmapFactory;
import android.os.Bundle;
import android.os.Handler;
import android.os.Message;
import android.view.Window;
import android.view.WindowManager;
import android.view.animation.Animation;
import android.view.animation.ScaleAnimation;
import android.widget.ImageView;
import android.widget.Toast;

import com.google.gson.Gson;
import com.loopj.android.http.AsyncHttpResponseHandler;
import com.loopj.android.http.BinaryHttpResponseHandler;
import com.loopj.android.http.TextHttpResponseHandler;
import com.xbw.mvp.R;
import com.xbw.mvp.model.Content;
import com.xbw.mvp.model.Start;
import com.xbw.mvp.util.Constant;
import com.xbw.mvp.util.HttpUtils;

import org.apache.http.Header;
import org.json.JSONException;
import org.json.JSONObject;

import java.io.File;
import java.io.FileOutputStream;
import java.io.IOException;


public class SplashActivity extends Activity {

    private ImageView iv_start;
    private Start content;
    private SharedPreference sharedPreference;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        requestWindowFeature(Window.FEATURE_NO_TITLE);
        getWindow().setFlags(WindowManager.LayoutParams.FLAG_FULLSCREEN, WindowManager.LayoutParams.FLAG_FULLSCREEN);
        if ((getIntent().getFlags() & Intent.FLAG_ACTIVITY_BROUGHT_TO_FRONT) != 0) {
            finish();
            return;
        }
        setContentView(R.layout.activity_splash);
        iv_start = (ImageView) findViewById(R.id.iv_start);
        sharedPreference=new SharedPreference(this);
        initImage();
    }
    private static final String SHAREDPREFERENCES_NAME = "my_pref";
    private static final String KEY_GUIDE_ACTIVITY = "guide_activity";
    private boolean isFirstEnter(Context context,String className){
        if(context==null || className==null||"".equalsIgnoreCase(className))return false;
        String mResultStr = context.getSharedPreferences(SHAREDPREFERENCES_NAME, Context.MODE_WORLD_READABLE)
                .getString(KEY_GUIDE_ACTIVITY, "");
        if(mResultStr.equalsIgnoreCase("false"))
            return false;
        else
            return true;
    }
    private final static int SWITCH_MAINACTIVITY = 1000;
    private final static int SWITCH_GUIDACTIVITY = 1001;
    public Handler mHandler = new Handler(){
        public void handleMessage(Message msg) {
            switch(msg.what){
                case SWITCH_MAINACTIVITY:
                    Intent mIntent = new Intent();
                    mIntent.setClass(SplashActivity.this, LoginActivity.class);
                    SplashActivity.this.startActivity(mIntent);
                    overridePendingTransition(android.R.anim.fade_in,
                            android.R.anim.fade_out);
                    SplashActivity.this.finish();
                    break;
                case SWITCH_GUIDACTIVITY:
                    mIntent = new Intent();
                    mIntent.setClass(SplashActivity.this, GuideActivity.class);
                    SplashActivity.this.startActivity(mIntent);
                    overridePendingTransition(android.R.anim.fade_in,
                            android.R.anim.fade_out);
                    SplashActivity.this.finish();
                    break;
            }
            super.handleMessage(msg);
        }
    };

    private void initImage() {
        File dir = getFilesDir();
        final File imgFile = new File(dir, "start.jpg");
        if (imgFile.exists()) {
            iv_start.setImageBitmap(BitmapFactory.decodeFile(imgFile.getAbsolutePath()));
        } else {
            iv_start.setImageResource(R.drawable.start);
        }

        final ScaleAnimation scaleAnim = new ScaleAnimation(1.0f, 1.2f, 1.0f, 1.2f,
                Animation.RELATIVE_TO_SELF, 0.5f, Animation.RELATIVE_TO_SELF,
                0.5f);
        scaleAnim.setFillAfter(true);
        scaleAnim.setDuration(3000);
        scaleAnim.setAnimationListener(new Animation.AnimationListener() {
            @Override
            public void onAnimationStart(Animation animation) {

            }
            @Override
            public void onAnimationEnd(Animation animation) {
                if (HttpUtils.isNetworkConnected(SplashActivity.this)) {
                    HttpUtils.gets(Constant.SPLASH, new TextHttpResponseHandler() {
                        @Override
                        public void onFailure(int statusCode, Header[] headers, String responseString, Throwable throwable) {
                            startActivity();
                            //Toast.makeText(SplashActivity.this,"shibai",Toast.LENGTH_SHORT).show();
                        }
                        @Override
                        public void onSuccess(int statusCode, Header[] headers, String responseString) {
                            Gson gson = new Gson();
                            content = gson.fromJson(responseString, Start.class);
                            //第一次启动本地无名字存储
                            if(sharedPreference.isSplash(this.getClass().getName())){
                                //开屏页的名字跟本地名字一样就不下载图片
                                if(content.getname().equals(sharedPreference.getSplash())){
                                    startActivity();
                                }else{
                                    //Toast.makeText(SplashActivity.this,content.getimg(),Toast.LENGTH_SHORT).show();
                                    HttpUtils.getImage(content.getimg(), new BinaryHttpResponseHandler() {
                                        @Override
                                        public void onSuccess(int i, Header[] headers, byte[] bytes) {
                                            saveImage(imgFile, bytes);
                                            //保存新的图片名字到本地
                                            sharedPreference.KeepSplash(content.getname());
                                            //Toast.makeText(SplashActivity.this,"下载图片成功",Toast.LENGTH_SHORT).show();
                                            startActivity();
                                        }
                                        @Override
                                        public void onFailure(int i, Header[] headers, byte[] bytes, Throwable throwable) {
                                            startActivity();
                                            //Toast.makeText(SplashActivity.this,"下载图片失败",Toast.LENGTH_SHORT).show();
                                        }
                                        @Override
                                        public String[] getAllowedContentTypes() {
                                            return super.getAllowedContentTypes();
                                        }
                                    });
                                }
                            }else{
                                //Toast.makeText(SplashActivity.this,content.getimg(),Toast.LENGTH_SHORT).show();
                                HttpUtils.getImage(content.getimg(), new BinaryHttpResponseHandler() {
                                    @Override
                                    public void onSuccess(int i, Header[] headers, byte[] bytes) {
                                        saveImage(imgFile, bytes);
                                        //保存新的图片名字到本地
                                        sharedPreference.KeepSplash(content.getname());
                                        //Toast.makeText(SplashActivity.this,"下载图片成功",Toast.LENGTH_SHORT).show();
                                        startActivity();
                                    }
                                    @Override
                                    public void onFailure(int i, Header[] headers, byte[] bytes, Throwable throwable) {
                                        startActivity();
                                        //Toast.makeText(SplashActivity.this,"下载图片失败",Toast.LENGTH_SHORT).show();
                                    }
                                    @Override
                                    public String[] getAllowedContentTypes() {
                                        return super.getAllowedContentTypes();
                                    }
                                });
                            }

                        }
                    });
                } else {
                    Toast.makeText(SplashActivity.this, "没有网络连接!", Toast.LENGTH_LONG).show();
                    startActivity();
                }
            }

            @Override
            public void onAnimationRepeat(Animation animation) {

            }
        });
        iv_start.startAnimation(scaleAnim);

    }

    private void startActivity() {
        boolean mFirst = isFirstEnter(SplashActivity.this,SplashActivity.this.getClass().getName());
        if(mFirst) {

            mHandler.sendEmptyMessageDelayed(SWITCH_GUIDACTIVITY,1000);
        }
        else {
            mHandler.sendEmptyMessageDelayed(SWITCH_MAINACTIVITY,1000);
        }
        //Intent intent = new Intent(SplashActivity.this, MainActivity.class);
        //startActivity(intent);
        //overridePendingTransition(android.R.anim.fade_in,
        //        android.R.anim.fade_out);
        //finish();
    }

    public void saveImage(File file, byte[] bytes) {
        try {
            if (file.exists()) {
                file.delete();
            }
            FileOutputStream fos = new FileOutputStream(file);
            //Toast.makeText(SplashActivity.this,file.getAbsolutePath(),Toast.LENGTH_SHORT).show();
            fos.write(bytes);
            fos.flush();
            fos.close();
        } catch (IOException e) {
            e.printStackTrace();
        }

    }
} 


