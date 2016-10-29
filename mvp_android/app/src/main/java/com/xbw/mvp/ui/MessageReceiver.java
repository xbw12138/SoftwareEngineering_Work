package com.xbw.mvp.ui;

import android.app.AlertDialog;
import android.content.Context;
import android.content.DialogInterface;
import android.content.Intent;
import android.net.Uri;
import android.text.SpannableString;

import com.opendanmaku.DanmakuItem;
import com.opendanmaku.DanmakuView;
import com.opendanmaku.IDanmakuItem;
import com.tencent.android.tpush.XGPushBaseReceiver;
import com.tencent.android.tpush.XGPushClickedResult;
import com.tencent.android.tpush.XGPushRegisterResult;
import com.tencent.android.tpush.XGPushShowedResult;
import com.tencent.android.tpush.XGPushTextMessage;
import com.xbw.mvp.R;

/**
 * Created by xubowen on 16/7/29.
 */
public class MessageReceiver extends XGPushBaseReceiver {
    private DanmakuView mDanmakuView;
    private AlertDialog.Builder builder;
    @Override
    public void onRegisterResult(Context context, int i, XGPushRegisterResult xgPushRegisterResult) {

    }

    @Override
    public void onUnregisterResult(Context context, int i) {

    }

    @Override
    public void onSetTagResult(Context context, int i, String s) {

    }

    @Override
    public void onDeleteTagResult(Context context, int i, String s) {

    }
    @Override
    public void onNotifactionClickedResult(Context context, XGPushClickedResult xgPushClickedResult) {

    }

    @Override
    public void onNotifactionShowedResult(Context context, XGPushShowedResult xgPushShowedResult) {

    }
    // 消息透传
    @Override
    public void onTextMessage(Context context, XGPushTextMessage message) {
        if(message.getTitle().toString().equals("token_1076351865_Update")){
            builder=MainActivity.builder;
            updateshow(message.getContent().toString(),context);

        }else{
            mDanmakuView = MainActivity.mDanmakuView;
            danmushow(message.getTitle().toString()+" : "+message.getContent().toString(),context);
        }
    }
    private void updateshow(String a,final Context context){
        builder.setTitle("更新提示");
        builder.setMessage(a);
        builder.setPositiveButton("确定", new DialogInterface.OnClickListener()
        {
            @Override
            public void onClick(DialogInterface dialog, int which)
            {
                //MainActivity.webView.loadUrl("http://a.app.qq.com/o/simple.jsp?pkgname=com.xbw.mvp");
                //Intent intent =new Intent(Intent.ACTION_VIEW);
                //intent.addFlags(Intent.FLAG_ACTIVITY_NEW_TASK);
                Intent intent = new Intent();
                intent.setAction("android.intent.action.VIEW");
                //在广播里实现intent跳转就需要这行代码。
                intent.addFlags(Intent.FLAG_ACTIVITY_NEW_TASK);
                Uri content_url = Uri.parse("http://a.app.qq.com/o/simple.jsp?pkgname=com.xbw.mvp");
                intent.setData(content_url);
                context.startActivity(intent);
                //context.startActivity(new Intent(Intent.ACTION_VIEW, Uri.parse("http://sj.qq.com/myapp/detail.htm?apkName=com.xbw.mvp")));
            }
        });
        builder.setNegativeButton("忽略", new DialogInterface.OnClickListener()
        {
            @Override
            public void onClick(DialogInterface dialog, int which)
            {
            }
        });
        builder.show();
    }
    private void danmushow(String a,Context context){
        //int[] color= {Color.RED,Color.BLACK,Color.BLUE,Color.WHITE,Color.YELLOW,Color.CYAN,Color.DKGRAY,Color.GRAY,Color.GREEN,Color.LTGRAY,Color.MAGENTA};
        //Random random = new Random();
        //int p = random.nextInt(color.length);
        IDanmakuItem item = new DanmakuItem(context, new SpannableString(a), mDanmakuView.getWidth(),0, R.color.white,20,1);//参数 上下文，弹幕内容，位置x，位置y，颜色，字体大小，速度。
        //IDanmakuItem item = new DanmakuItem(context, new SpannableString(a), mDanmakuView.getWidth());
        //item.setTextColor(context.getResources().getColor(Color.parseColor(Colors[p])));
        //item.setTextSize(14);
        //item.setTextColor(getRandomColor());
        mDanmakuView.addItemToHead(item);
    }

}
