<template>
    <component
        :is="{template: templateData}"
        v-on:change="load"
        v-on:search="search">
    </component>
</template>

<script>
    import axios from 'axios';

    export default {
        props  : ['template'],
        data   : function () {
            return {
                templateData: this.template
            }
        },
        methods: {
            load(url) {
                let self = this;
                axios.get(url).then(response => {
                    window.history.pushState({}, url, url);
                    self.templateData = response.data;
                })
            },
            search(e) {
                this.load(e.target.action + "?" + $(e.target).serialize());
            }
        }
    }
</script>
