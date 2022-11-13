<template>
  <div class="w-full h-full">
    <div class="model-title">
      <div class="title-btn absolute"><i @click="back()" class="fas fa-arrow-left"></i></div>
      <div class="title-name">Background Choose</div>
    </div>
    <div class="flex flex-box">
      <div class="flex-none border-y-0 border-l-0 border-r border-solid border-gray-200">
        <ul class="categories-ul">
          <li class="active">Couple<span>40</span></li>
          <li>Hot Sale<span>10</span></li>
          <li>Couple<span>40</span></li>
          <li>New Arrivals<span>10</span></li>
          <li>Hot Sale<span>10</span></li>
          <li>Couple<span>40</span></li>
          <li>New Arrivals<span>10</span></li>
          <li>Hot Sale<span>10</span></li>
          <li>Couple<span>40</span></li>
          <li>New Arrivals<span>10</span></li>
          <li>Hot Sale<span>10</span></li>
          <li>Couple<span>40</span></li>
          <li>New Arrivals<span>10</span></li>
          <li>Hot Sale<span>10</span></li>
          <li>Couple<span>40</span></li>
          <li>New Arrivals<span>10</span></li>
        </ul>
      </div>
      <div class="flex-1 grid grid-cols-1 md:grid-cols-3 gap-4 grid-box">
        <div></div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {};
  },
  methods: {
    back(e) {

    }
  }
}
</script>

<style scoped>

</style>