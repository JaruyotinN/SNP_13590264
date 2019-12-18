<template>
 <div class="col-md-12">
            <div class="mb-3"> 
                     <router-link :to="{name:'student'}">ย้อนกลับ</router-link>
            </div>
            <div class="row">
                <div class="col-md-10">
                    <div class="mb-3 ml-3 mt-2">
                        <h4 class="mb-2 bold">{{head.company.name}}</h4>
                    </div>
                </div>
            </div>
            <hr>
</div>
</template>
<script>
    export default {
        props:['head']
    }
</script>

<style  scoped>

</style>