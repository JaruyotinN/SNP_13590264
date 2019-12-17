<template>
        <div class="card mt-4">
             <div class="col-12">
                  <div class="card-info">
                    <h5 class="bold mt-3">คำถามเด็กฝึกงาน</h5>
                    <div class="form-group">
                         <p>{{ question.text }}</p>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                    </div>
                  </div> 
              </div>
        </div>
</template>

<script>
export default {
    props:['question']
}
</script>

<style scoped>
.card{
    padding-bottom: 10px;
    box-shadow: 0 1px 6px 0 rgba(0,0,0,0.5);
    border-radius: 5px;
}

.card-info{
    text-align: center;
    margin-top: 2px;
    padding: 5px 0 5px 0;
    font-size: 1rem;
    line-height: 19px;
    color: #4A4A4A;
}
</style>