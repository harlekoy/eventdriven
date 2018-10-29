<template>
  <div>
    <v-date-picker v-model="date" @input="onUpdate" mode='single' />
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

  components: {
    VDatePicker: DatePicker
  },

  methods: {
    onUpdate (value) {
      this.$emit('input', value)
    }
  }
}
</script>
