package com.xbw.mvp.adapter;

import android.app.Activity;
import android.content.Context;
import android.graphics.Color;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.BaseAdapter;
import android.widget.FrameLayout;
import android.widget.ImageView;
import android.widget.LinearLayout;
import android.widget.TextView;

import com.nostra13.universalimageloader.core.DisplayImageOptions;
import com.nostra13.universalimageloader.core.ImageLoader;
import com.xbw.mvp.R;
import com.xbw.mvp.model.StoriesEntity;
import com.xbw.mvp.ui.MainActivity;
import com.xbw.mvp.util.Constant;

import java.util.ArrayList;
import java.util.List;


/**
 * Created by wwjun.wang on 2015/8/13.
 */
public class MainNewsItemAdapter extends BaseAdapter {
    private List<StoriesEntity> entities;
    private Context context;
    private ImageLoader mImageloader;
    private DisplayImageOptions options;
    private boolean isLight=true;

    public MainNewsItemAdapter(Context context) {
        this.context = context;
        this.entities = new ArrayList<>();
        mImageloader = ImageLoader.getInstance();
        options = new DisplayImageOptions.Builder()
                .cacheInMemory(true)
                .cacheOnDisk(true)
                .build();
    }

    public void addList(List<StoriesEntity> items) {
        this.entities.addAll(items);
        notifyDataSetChanged();
    }

    @Override
    public int getCount() {
        return entities.size();
    }

    @Override
    public Object getItem(int position) {
        return entities.get(position);
    }

    @Override
    public long getItemId(int position) {
        return position;
    }

    @Override
    public View getView(int position, View convertView, ViewGroup parent) {
        ViewHolder viewHolder = null;
        if (convertView == null) {
            viewHolder = new ViewHolder();
            convertView = LayoutInflater.from(context).inflate(R.layout.main_news_item, parent, false);
            viewHolder.tv_topic = (TextView) convertView.findViewById(R.id.tv_topic);
            viewHolder.tv_title = (TextView) convertView.findViewById(R.id.tv_title);
            viewHolder.iv_title = (ImageView) convertView.findViewById(R.id.iv_title);
            convertView.setTag(viewHolder);
        } else {
            viewHolder = (ViewHolder) convertView.getTag();
        }
        if (true) {
            viewHolder.tv_title.setTextColor(context.getResources().getColor(R.color.clicked_tv_textcolor));
        } else {
            viewHolder.tv_title.setTextColor(context.getResources().getColor(isLight ? android.R.color.black : android.R.color.white));
        }
        ((LinearLayout) viewHolder.iv_title.getParent().getParent().getParent()).setBackgroundColor(context.getResources().getColor(R.color.light_news_item));
        viewHolder.tv_topic.setTextColor(context.getResources().getColor(R.color.light_news_topic));
        StoriesEntity entity = entities.get(position);
        if (entity.getType() == Constant.TOPIC) {
            ((FrameLayout) viewHolder.tv_topic.getParent()).setBackgroundColor(Color.TRANSPARENT);
            viewHolder.tv_title.setVisibility(View.GONE);
            viewHolder.iv_title.setVisibility(View.GONE);
            viewHolder.tv_topic.setVisibility(View.VISIBLE);
            viewHolder.tv_topic.setText(entity.getTitle());
        } else {
            ((FrameLayout) viewHolder.tv_topic.getParent()).setBackgroundResource(R.drawable.item_background_selector_light);
            viewHolder.tv_topic.setVisibility(View.GONE);
            viewHolder.tv_title.setVisibility(View.VISIBLE);
            viewHolder.iv_title.setVisibility(View.VISIBLE);
            viewHolder.tv_title.setText(entity.getTitle());
            mImageloader.displayImage(entity.getImages().get(0), viewHolder.iv_title, options);
        }
        return convertView;
    }

    public static class ViewHolder {
        TextView tv_topic;
        TextView tv_title;
        ImageView iv_title;
    }

}