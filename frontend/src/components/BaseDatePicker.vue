<template>
  <div>
    <VDatePicker 
      v-model="date" 
      mode="single" 
      @input="onUpdate"
    />
  </div>
</template>

<script>
import { setupCalendar, Calendar, DatePicker } from 'v-calendar'
import 'v-calendar/lib/v-calendar.min.css';

// Remember to setup calendar (passing in defaults if needed)
setupCalendar({
  firstDayOfWeek: 2
});

export default {

  components: {
    VDatePicker: DatePicker
  },
  inheritAttrs: false,

  props: {
    value: Date
  },

  data() {
    return {
      date: null
    };
  },

  mounted () {
    this.date = this.value ? this.value : null
  },

  methods: {
    onUpdate (value) {
      this.$emit('input', value)
    }
  }
}
</script>
