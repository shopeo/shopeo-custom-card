<template>
  <div class="w-full h-full">
    <div class="model-title">
      <div class="title-btn"><i @click="back()" class="fas fa-arrow-left"></i></div>
      <div class="flex"><span class="mr-2">Skin Color:</span>
        <div class="grid grid-cols-3 gap-2 align-middle">
          <div @click="changeSkin('white')"
               class="w-12 h-8 bg-orange-100 rounded-md border-4 border-solid border-white cursor-pointer"
               :class="skin==='white'?'active':''"></div>
          <div @click="changeSkin('black')"
               class="w-12 h-8 bg-yellow-800 rounded-md border-4 border-solid border-white cursor-pointer"
               :class="skin==='black'?'active':''"></div>
          <div @click="changeSkin('yellow')"
               class="w-12 h-8 bg-orange-300 rounded-md border-4 border-solid border-white cursor-pointer"
               :class="skin==='yellow'?'active':''"></div>
        </div>
      </div>
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
    return {
      skin: 'white'
    };
  },
  methods: {
    back(e) {

    },
    changeSkin(skin) {
      this.skin = skin;
    }
  }
}
</script>

<style scoped>

</style>