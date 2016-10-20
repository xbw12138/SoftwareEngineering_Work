package com.xbw.mvp.model;

import java.util.List;

/**
 * Created by xubowen on 2016/10/19.
 */
public class Latest {


    /**
     *{"date":"20161019","stories":[{"title":"山西的古建筑，简直就是开挂一般的存在","ga_prefix":"101919","images":["http:\/\/pic3.zhimg.com\/e42ad2a598fd09b6347c9dee0ed7c46e.jpg"],"multipic":true,"type":0,"id":8891786},{"title":"如何迈入科学观鸟的大坑（划掉）门","ga_prefix":"101918","images":["http:\/\/pic3.zhimg.com\/88d43428cc47063d332abaf0137db4b6.jpg"],"multipic":true,"type":0,"id":8900972},{"images":["http:\/\/pic4.zhimg.com\/edb8023267b5821579c1eb5f0dc0f243.jpg"],"type":0,"id":8901317,"ga_prefix":"101917","title":"知乎好问题 · 怎样才能拍出那种超级大的月亮？"},{"title":"一盘东北地三鲜，下得三碗大米饭","ga_prefix":"101916","images":["http:\/\/pic2.zhimg.com\/531dfa9ecd9808b9b42e6be7dd1fdec5.jpg"],"multipic":true,"type":0,"id":8900845},{"title":"为什么看了那么多家居美图，我的家里还是乱七八糟？","ga_prefix":"101915","images":["http:\/\/pic2.zhimg.com\/565382590a2b027fe6182d1cac9e546d.jpg"],"multipic":true,"type":0,"id":8901047},{"title":"三分钟培训 + 考试，从此一眼分清公猫母猫","ga_prefix":"101914","images":["http:\/\/pic4.zhimg.com\/7db51d247c8a0c747551a171513dd99b.jpg"],"multipic":true,"type":0,"id":8900877},{"images":["http:\/\/pic1.zhimg.com\/15a66e40f7c1220639a7489079597874.jpg"],"type":0,"id":8898232,"ga_prefix":"101913","title":"「这孩子又白又胖可真好」，不，并不好，甚至可能出问题"},{"images":["http:\/\/pic1.zhimg.com\/90987dbdf5135d2f26f7141cd3e8a9a0.jpg"],"type":0,"id":8893648,"ga_prefix":"101912","title":"大误 · 所以你猜，我们当中谁最厉害？"},{"images":["http:\/\/pic2.zhimg.com\/b1bb8f2560235063e008dc452e1cd9ed.jpg"],"type":0,"id":8897852,"ga_prefix":"101911","title":"难以定义的「文化」，也在影响着经济发展"},{"images":["http:\/\/pic4.zhimg.com\/323bf8fdf221aa0a2bd9c809a1a1e51f.jpg"],"type":0,"id":8898922,"ga_prefix":"101910","title":"细胞是如何杀死病毒的？"},{"images":["http:\/\/pic2.zhimg.com\/0b60d6d630aec63074b0474a2ab4bed1.jpg"],"type":0,"id":8894051,"ga_prefix":"101909","title":"作为全职家庭主妇，我自编自导拍了个电影"},{"images":["http:\/\/pic1.zhimg.com\/de3c6c4c04335114336a2972cdd26a98.jpg"],"type":0,"id":8898697,"ga_prefix":"101908","title":"网约车让城市变得更堵了吗？"},{"images":["http:\/\/pic4.zhimg.com\/1bcab5aaade024bc69b347e2e53d6fe7.jpg"],"type":0,"id":8899106,"ga_prefix":"101907","title":"昨晚的发布会，老罗拿出了这两款手机和系统新功能"},{"images":["http:\/\/pic1.zhimg.com\/a49d840ef349caaf42e9a88128e2141c.jpg"],"type":0,"id":8897393,"ga_prefix":"101907","title":"人工智能领域，中国人 \/ 华人有多牛？大概占了半壁江山吧"},{"images":["http:\/\/pic3.zhimg.com\/fe0da2b13e9b4e4dac6b42d207e2a7da.jpg"],"type":0,"id":8899108,"ga_prefix":"101907","title":"读读日报 24 小时热门 TOP 5 · 他拍了十年北京地铁"},{"images":["http:\/\/pic4.zhimg.com\/101c11d19815cc1444ba5146053ddfa3.jpg"],"type":0,"id":8895213,"ga_prefix":"101906","title":"瞎扯 · 如何正确地吐槽"}],"top_stories":[{"image":"http:\/\/pic3.zhimg.com\/18087d865f4d4404ccdeababd14f0822.jpg","type":0,"id":8901317,"ga_prefix":"101917","title":"知乎好问题 · 怎样才能拍出那种超级大的月亮？"},{"image":"http:\/\/pic1.zhimg.com\/0d7cae2858b5d5140ebb3f56f424f89c.jpg","type":0,"id":8901047,"ga_prefix":"101915","title":"为什么看了那么多家居美图，我的家里还是乱七八糟？"},{"image":"http:\/\/pic3.zhimg.com\/68878f7c7a6a1af14a367abc54c20792.jpg","type":0,"id":8898697,"ga_prefix":"101908","title":"网约车让城市变得更堵了吗？"},{"image":"http:\/\/pic3.zhimg.com\/cc07c9ee77734aff64d36dfc44365e46.jpg","type":0,"id":8899106,"ga_prefix":"101907","title":"昨晚的发布会，老罗拿出了这两款手机和系统新功能"},{"image":"http:\/\/pic4.zhimg.com\/e70c322a4196d8c702ff33fa32bf9bcb.jpg","type":0,"id":8897393,"ga_prefix":"101907","title":"人工智能领域，中国人 \/ 华人有多牛？大概占了半壁江山吧"}]}
     *
     */
    private List<TopStoriesEntity> top_stories;
    private List<StoriesEntity> stories;
    private String date;

    public void setTop_stories(List<TopStoriesEntity> top_stories) {
        this.top_stories = top_stories;
    }

    public void setStories(List<StoriesEntity> stories) {
        this.stories = stories;
    }

    public void setDate(String date) {
        this.date = date;
    }

    public List<TopStoriesEntity> getTop_stories() {
        return top_stories;
    }

    public List<StoriesEntity> getStories() {
        return stories;
    }

    public String getDate() {
        return date;
    }

    public static class TopStoriesEntity {
        /**
         * id : 7048089
         * title : 发生类似天津爆炸事故时，该如何自救？
         * ga_prefix : 081309
         * image : http://pic4.zhimg.com/494dafbd64c141fd023d4e58b3343fcb.jpg
         * type : 0
         */
        private int id;
        private String title;
        private String ga_prefix;
        private String image;
        private int type;

        public void setId(int id) {
            this.id = id;
        }

        public void setTitle(String title) {
            this.title = title;
        }

        public void setGa_prefix(String ga_prefix) {
            this.ga_prefix = ga_prefix;
        }

        public void setImage(String image) {
            this.image = image;
        }

        public void setType(int type) {
            this.type = type;
        }

        public int getId() {
            return id;
        }

        public String getTitle() {
            return title;
        }

        public String getGa_prefix() {
            return ga_prefix;
        }

        public String getImage() {
            return image;
        }

        public int getType() {
            return type;
        }

        @Override
        public String toString() {
            return "TopStoriesEntity{" +
                    "id=" + id +
                    ", title='" + title + '\'' +
                    ", ga_prefix='" + ga_prefix + '\'' +
                    ", image='" + image + '\'' +
                    ", type=" + type +
                    '}';
        }
    }


    @Override
    public String toString() {
        return "Latest{" +
                "top_stories=" + top_stories +
                ", stories=" + stories +
                ", date='" + date + '\'' +
                '}';
    }
}
