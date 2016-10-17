package com.xbw.mvp.ui;

import android.os.Bundle;

import com.xbw.mvp.left.SwipeBackActivity;
import com.xbw.mvp.left.SwipeBackLayout;


public class BaseLeftActivity extends SwipeBackActivity {
	private SwipeBackLayout mSwipeBackLayout;

	protected void onCreate(Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);
		mSwipeBackLayout = getSwipeBackLayout();
	}

}
