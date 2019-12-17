<template>
<div>
    <div class="mb-5">
        <h4 class="center bold mb-3">สถานะของการฝึกงาน</h4>
        <ul class="progressbar mt-3">
            <li class="active">ผลการตอบรับจากทางบริษัท</li>
            <li>ยืนยันจากสถานที่ฝึกงาน</li>
            <li>ตรวจสอบข้อมูลเพื่อยืนยัน</li>
            <li>รับเอกสารอนุเคราะห์ขอฝึกงาน</li>
        </ul>
    </div>
    <hr>
</div>
</template>

<script>
    export default {
        
    }
</script>

<style  scoped>

 .progressbar {
      counter-reset: step;
      height: 5rem;
  }
  .progressbar li {
      list-style-type: none;
      width: 25%;
      float: left;
      font-size: 12px;
      position: relative;
      text-align: center;
      text-transform: uppercase;
      color: #7d7d7d;
  }
  .progressbar li:before {
      width: 50px;
      height: 50px;
      content: counter(step);
      counter-increment: step;
      line-height: 45px;
      border: 2px solid #7d7d7d;
      display: block;
      text-align: center;
      font-size: 1.5rem;
      margin: 0 auto 10px auto;
      border-radius: 50%;
      background-color: white;
  }
  .progressbar li:after {
      width: 100%;
      height: 2px;
      content: '';
      position: absolute;
      margin: 10px auto 0px auto;
      background-color: #7d7d7d;
      top: 15px;
      left: -50%;
      z-index: -1;
  }
  .progressbar li:first-child:after {
      content: none;
  }
  .progressbar li.active {
     color: #0047BA;
  }
  .progressbar li.active:before {
      border-color: #0047BA;
  }
  .progressbar li.active + li:after {
      background-color: #0047BA;
  }
</style>
