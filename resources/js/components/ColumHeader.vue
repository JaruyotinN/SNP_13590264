<template>
 <div class="col-md-12">
            <div class="mb-3"> 
                     <router-link :to="{name:showBack}" v-if="showBack">ย้อนกลับ</router-link>
                     <div v-if="img" class="img-circle" style="float:right;">
                            <img :src="img">
                        </div>
            </div>
            <div class="row">
                <div class="col-md-10">
                    <div class="mb-3 ml-3 mt-2">
                        <h4 class="mb-2 bold">{{title}}</h4>
                        <span v-if="description">
                            {{description}}
                        </span>
                    </div>
                   
                </div>
            </div>
            <hr>
</div>
</template>
<script>
    export default {
        props: {
            title: {
                type: String,
                default: ''
            },
             description: {
                type: String,
                default: ''
            },
            showBack: {
                type: String,
                default: ''
            },
             img: {
                type: String,
                default: ''
            },
        },
    }
</script>

<style  scoped>
.img-circle{
    width: 100px;
    height: 100px;
    border-radius: 50%;
    overflow: hidden; 
    float: left;
}
.img-circle img{
    width: 100%;
}

</style>