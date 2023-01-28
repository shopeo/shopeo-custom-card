<template>
  <div class="w-full h-full flex flex-col">
    <div class="model-title">
      <div class="title-btn absolute"><i @click="back()" class="fas fa-arrow-left"></i></div>
      <div class="title-name">Background Choose</div>
    </div>
    <div class="grow">
    </div>
    <div class="p-4 bg-gray-100 rounded-b">

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
      this.$store.dispatch('step', 'select-background');
    }
  }
}
</script>

<style scoped>

</style>