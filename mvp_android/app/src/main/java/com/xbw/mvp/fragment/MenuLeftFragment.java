package com.xbw.mvp.fragment;

import android.app.Activity;
import android.app.AlertDialog;
import android.content.DialogInterface;
import android.content.Intent;
import android.content.SharedPreferences;
import android.graphics.Bitmap;
import android.os.Bundle;
import android.support.v4.app.Fragment;
import android.view.LayoutInflater;
import android.view.View;
import android.view.View.OnClickListener;
import android.view.ViewGroup;
import android.view.animation.Animation;
import android.view.animation.AnimationUtils;
import android.widget.Button;
import android.widget.TextView;
import android.widget.Toast;

import com.xbw.mvp.R;
import com.xbw.mvp.ui.LoginActivity;
import com.xbw.mvp.ui.MainActivity;
import com.xbw.mvp.ui.SaoYiSao;
import com.xbw.mvp.ui.SharedPreference;
import com.xbw.mvp.ui.WebActivity;
import com.xbw.mvp.ui.ZhiActivity;

public class MenuLeftFragment extends Fragment implements OnClickListener {
	Button btn1;
	Button btn2;
	Button btn3;
	Button btn4;
	Button btn5;
	Button btn6;
	Button btn7;
	Button btn8;
	Button btn10;
	Button btn_setting;
	Button btn_exit;
	Bitmap bitmap;
	TextView tex;
	private CircleImgFragment avatarImg;
	private static final String CONFIG_URL_KEYS = "CONFIG_URL_KEYS";
	//public ImageLoaderHead imageLoaders;

	@Override
	public View onCreateView(LayoutInflater inflater, ViewGroup container,
							 Bundle savedInstanceState) {
		return inflater.inflate(R.layout.fragment_drawer, container, false);
	}

	public void onActivityCreated(Bundle savedInstanceState) {
		super.onActivityCreated(savedInstanceState);
		avatarImg = (CircleImgFragment) getActivity().findViewById(
				R.id.user_logo);
		Animation shake = AnimationUtils.loadAnimation(getActivity(),
				R.anim.shake);
		//imageLoaders = new ImageLoaderHead(getActivity());
		//imageLoaders.DisplayImage(Singleton.getInstance().getHead(), avatarImg);
		avatarImg.startAnimation(shake);
		init();
	}

	@Override
	public void onResume() {
		super.onResume();
		Animation shake = AnimationUtils.loadAnimation(getActivity(),
				R.anim.shake);
		avatarImg.startAnimation(shake);
		SharedPreference sharedpreference = new SharedPreference(getActivity());
		boolean islogin = sharedpreference.isLogin(getActivity().getClass()
				.getName());
		if (islogin) {
			tex.setText("已登陆");
		} else {
			tex.setText("未登录");
		}
	}

	public void init() {
		btn1 = (Button) getActivity().findViewById(R.id.button_imga);
		btn2 = (Button) getActivity().findViewById(R.id.button_imgb);
		btn3 = (Button) getActivity().findViewById(R.id.button_imgc);
		btn4 = (Button) getActivity().findViewById(R.id.button_imgd);
		btn5 = (Button) getActivity().findViewById(R.id.button_imge);
		btn6 = (Button) getActivity().findViewById(R.id.button_imgf);
		btn7 = (Button) getActivity().findViewById(R.id.button_imgg);
		btn8 = (Button) getActivity().findViewById(R.id.button_imgh);
		btn10 = (Button) getActivity().findViewById(R.id.button_imgi);
		btn_setting = (Button) getActivity().findViewById(R.id.btn_settings);
		btn_exit = (Button) getActivity().findViewById(R.id.btn_exit);
		tex = (TextView) getActivity().findViewById(R.id.user_nickname);

		btn1.setOnClickListener(this);
		btn2.setOnClickListener(this);
		btn3.setOnClickListener(this);
		btn4.setOnClickListener(this);
		btn5.setOnClickListener(this);
		btn6.setOnClickListener(this);
		btn7.setOnClickListener(this);
		btn8.setOnClickListener(this);
		btn10.setOnClickListener(this);
		btn_setting.setOnClickListener(this);
		btn_exit.setOnClickListener(this);
		avatarImg.setOnClickListener(this);
		SharedPreference sharedpreference = new SharedPreference(getActivity());
		boolean islogin = sharedpreference.isLogin(getActivity().getClass()
				.getName());
		if (islogin) {
			tex.setText("已登陆");
		} else {
			tex.setText("未登录");
		}
	}

	@Override
	public void onClick(View v) {
		// TODO 自动生成的方法存根
		Intent mIntent = new Intent();
		SharedPreference sharedpreference = new SharedPreference(getActivity());
		boolean islogin = sharedpreference.isLogin(getActivity().getClass()
				.getName());
		if (islogin) {
			switch (v.getId()) {
				case R.id.button_imga:
					mIntent.setClass(getActivity(), WebActivity.class);
					mIntent.putExtra("title_name",
							getString(R.string.menu_button_1));
					mIntent.putExtra("url", getString(R.string.menu_button_url_1));
					getActivity().startActivity(mIntent);
					break;
				case R.id.button_imgb:
					mIntent.setClass(getActivity(), WebActivity.class);
					mIntent.putExtra("title_name",
							getString(R.string.menu_button_2));
					mIntent.putExtra("url", getString(R.string.menu_button_url_2));
					getActivity().startActivity(mIntent);
					break;
				case R.id.button_imgc:
					mIntent.setClass(getActivity(), ZhiActivity.class);
					mIntent.putExtra("title_name",
							getString(R.string.menu_button_3));
					//mIntent.putExtra("url", getString(R.string.menu_button_url_3));
					getActivity().startActivity(mIntent);
					break;
				case R.id.button_imgd:
					mIntent.setClass(getActivity(), WebActivity.class);
					mIntent.putExtra("title_name",
							getString(R.string.menu_button_4));
					mIntent.putExtra("url", getString(R.string.menu_button_url_4)+readUserId());
					//不要getActivity().
					startActivityForResult(mIntent, 1000);
					break;
				case R.id.button_imge:
					mIntent.setClass(getActivity(), WebActivity.class);
					mIntent.putExtra("title_name",
							getString(R.string.menu_button_5));
					mIntent.putExtra("url", getString(R.string.menu_button_url_5)+readUserId());
					mIntent.putExtra("flag", "1");
					getActivity().startActivity(mIntent);
					break;
				case R.id.button_imgf:
					mIntent.setClass(getActivity(), WebActivity.class);
					mIntent.putExtra("title_name",
							getString(R.string.menu_button_6));
					mIntent.putExtra("url", getString(R.string.menu_button_url_6));
					getActivity().startActivity(mIntent);
					break;
				case R.id.button_imgg:
					mIntent.setClass(getActivity(), WebActivity.class);
					mIntent.putExtra("title_name",
							getString(R.string.menu_button_7));
					mIntent.putExtra("url", getString(R.string.menu_button_url_7)+"&uid="+sharedpreference.getID());
					getActivity().startActivity(mIntent);
					break;
				case R.id.button_imgh:
					mIntent.setClass(getActivity(), WebActivity.class);
					mIntent.putExtra("title_name",
							getString(R.string.menu_button_8));
					mIntent.putExtra("url", getString(R.string.menu_button_url_8)+readUserId());
					getActivity().startActivity(mIntent);
					break;
				case R.id.button_imgi:
					mIntent.setClass(getActivity(), WebActivity.class);
					mIntent.putExtra("title_name",
							getString(R.string.menu_button_9));
					mIntent.putExtra("url", getString(R.string.menu_button_url_9));
					getActivity().startActivity(mIntent);
					break;
				case R.id.btn_settings:
					//mIntent.setClass(getActivity(), WebActivity.class);
					//mIntent.putExtra("title_name",
					//		getString(R.string.menu_button_10));
					//mIntent.putExtra("url", getString(R.string.menu_button_url_10));
					//getActivity().startActivity(mIntent);


					if (MainActivity.switchProxy.isChecked()) {
						Toast.makeText(getActivity(),"请关闭服务器进行设置",Toast.LENGTH_LONG).show();
						return;
					}
					new AlertDialog.Builder(getActivity())
							.setTitle(R.string.config_url)
							.setItems(new CharSequence[]{
									getString(R.string.config_url_scan),
									getString(R.string.config_url_manual)
							}, new android.content.DialogInterface.OnClickListener() {
								@Override
								public void onClick(DialogInterface dialogInterface, int i) {
									switch (i) {
										case 0:
											Intent intent = new Intent();
											intent.setClass(getActivity(), SaoYiSao.class);
											startActivityForResult(intent, 1001);
											break;
										case 1:
											break;
									}
								}
							})
							.show();


					break;
				case R.id.btn_exit:
					getActivity().finish();
					break;
				case R.id.user_logo:
					mIntent.setClass(getActivity(), WebActivity.class);
					mIntent.putExtra("title_name",
							getString(R.string.menu_button_5));
					mIntent.putExtra("url", getString(R.string.menu_button_url_5)+readUserId());
					mIntent.putExtra("flag", "1");
					getActivity().startActivity(mIntent);
					break;
			}
		}
	}
	String readUserId() {
		SharedPreferences preferences = getActivity().getSharedPreferences("userid", getActivity().MODE_PRIVATE);
		return preferences.getString(CONFIG_URL_KEYS, "");
	}
	@Override
	public void onActivityResult(int requestCode, int resultCode, Intent data) {
		super.onActivityResult(requestCode, resultCode, data);
		if(data==null)
			return ;
		if (requestCode == 1000) {
			String result_value = data.getStringExtra("close");
			if(result_value.equals("Y")){
				startActivity(new Intent(getActivity(), LoginActivity.class));
				getActivity().finish();
			}
		}
	}


}
