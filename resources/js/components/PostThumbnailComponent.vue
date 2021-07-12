<template>
    <div>
        <!-- <div v-for="post in posts" :key="post.id"> -->
 
    <div class="col-lg-9 col-md-8 col-xs-12">
                        <div class="row" >
                            <div v-for="post in posts.data" :key="post.id">
                            <div class="col-sm-6 col-xs-12">
                                <div class="featured-item">
                                    <div class="thumb">
                                        <div class="thumb-img">
                                            <img :src="'img/'+ post.image_name" alt="">
                                        </div>

                                        <div class="overlay-content">
                                         <strong title="Author"><i class="fa fa-user"></i> {{post.name}}</strong> &nbsp;&nbsp;&nbsp;&nbsp;
                                         <strong title="Posted on"><i class="fa fa-calendar"></i> {{post.created_at}}</strong> &nbsp;&nbsp;&nbsp;&nbsp;
                                         <strong title="Views"><i class="fa fa-map-marker"></i> {{post.view}}</strong>
                                        </div>
                                    </div>

                                    <div class="down-content">
                                        <h4>{{post.title}}</h4>

                                        <p>{{post.content}}</p>

                                        <div class="text-button">
                                            <a href="#">Read More</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> 

    </div>
</template>

<script>
    export default {
        data() {
            return {
              posts: {},
            }
        },
        methods: {
            getPosts(){
                axios.get('http://localhost:8000/api/posts')
                     .then((response)=>{
                       this.posts = response.data.posts
                
                     })
            }
        },
        mounted() {
            this.getPosts()

        }
    }
</script>