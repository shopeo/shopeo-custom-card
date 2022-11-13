<template>
  <div class="w-full h-full">
    <div class="model-title">
      <div class="title-btn"><i @click="back()" class="fas fa-arrow-left"></i></div>
      <div class="flex"><span class="mr-2">Skin Color:</span>
        <div class="grid grid-cols-3 gap-2 align-middle">
          <div class="w-12 h-8 bg-orange-100 rounded border-4 border-solid border-white"></div>
          <div class="w-12 h-8 bg-yellow-800 rounded border-4 border-solid border-white active"></div>
          <div class="w-12 h-8 bg-orange-300 rounded border-4 border-solid border-white"></div>
        </div>
      </div>
    </div>
    <div>

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