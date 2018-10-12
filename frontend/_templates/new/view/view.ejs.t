---
to: "src/router/views/<%= h.inflection.camelize(name) %>.vue"
---
<%
  const fileName = h.inflection.camelize(name)
  const importName = h.inflection.camelize(fileName.replace(/-/g, '_'))
%><template>
  <Layout>
    <%= h.inflection.titleize(name.replace(/-/g, '_')) %>
  </Layout>
</template>

<script>
import Layout from '@layouts/main'

export default {
  page: {
    title: '<%= importName %>',
    meta: [{ name: 'description', content: '<%= importName %>' }],
  },
  components: { Layout }
}
</script>
<%

if (useStyles) { %>
<style lang="scss" module>
@import '@design';
</style>
<% } %>
