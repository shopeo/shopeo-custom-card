<template>
  <div class="w-full h-full">
    <div class="model-title">
      <div class="title-btn absolute"><i @click="back()" class="fas fa-arrow-left"></i></div>
      <div class="title-name">Background Choose</div>
    </div>
    <div>

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
      this.$store.dispatch('step', 'select-background');
    }
  }
}
</script>

<style scoped>

</style>