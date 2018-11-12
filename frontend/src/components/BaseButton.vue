<template>
  <button 
    class="btn" 
    :class="$style.button" 
    v-on="$listeners"
  >
    <slot />
  </button>
</template>

<style module/>
