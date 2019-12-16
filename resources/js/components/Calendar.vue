<template>
	<div >
        <div class="col-12">
                <h4 class="bold"> {{ info.date }} </h4>
                <p>{{ info.description }} </p>
            <hr>
        </div>
	</div>
</template>

<script>
export default {
    props:['info']
}
</script>
<style scoped>
.bold{
    font-weight: 900;
}
</style>
