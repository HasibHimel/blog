<template>
    <div>
        
    <div class="col-lg-9 col-md-8 col-xs-12">
                        <div class="row" >
                            <div v-for="post in posts.data" :key="post.id">
                            <div class="col-sm-6 col-xs-12">
                                <div class="featured-item">
                                    <div class="thumb">
                                        <div class="thumb-img">
                                            <img src="img/1625571241.bayern-munich-bundesliga-title.jpg" alt="">
                                        </div>

                                        <div class="overlay-content">
                                         <strong title="Author"><i class="fa fa-user"></i> {{"Ami"}}</strong> &nbsp;&nbsp;&nbsp;&nbsp;
                                         <strong title="Posted on"><i class="fa fa-calendar"></i> {{"onek age"}}</strong> &nbsp;&nbsp;&nbsp;&nbsp;
                                         <strong title="Views"><i class="fa fa-map-marker"></i> {{post.view}}</strong>
                                        </div>
                                    </div>

                                    <div class="down-content">
                                        <h4>{{"valo"}}</h4>

                                        <p>{{"onek valo"}}</p>

                                        <div class="text-button">
                                            <a href="#">Read More</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                        </div>
            <!-- <div class="text-center"> {{ posts.links("pagination::bootstrap-4") }}</div> -->

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