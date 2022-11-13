<template>
  <div class="w-full h-full">
    <div class="model-title">
      <div class="title-btn absolute"><i @click="close()" class="fas fa-xmark"></i></div>
      <div class="title-name">Choose Photos Source</div>
    </div>
    <div class="my-2 px-4">
      <input type="file" class="hidden">
      <button class="w-full">Choose from your album</button>
    </div>
    <div class="p-4 pt-0">
      <div class="flex justify-between"><h5>Images Records (Click To Use)</h5><a href="javascript:;" @click="clear">Clear
        All</a></div>
      <div class="grid grid-cols-2 md:grid-cols-4 gap-4">

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
    close(e) {
      document.getElementById('custom-app').style.display = "none";
    }
  }
}
</script>

<style scoped>

</style>