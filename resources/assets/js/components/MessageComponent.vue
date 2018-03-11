<template>
    <div class="">

        <li class="list-group-item ":class="className"><slot></slot>
            <span class="badge">{{time}}</span>
        <span class="badge  ">{{user}}</span>
        </li>
    </div>
</template>

<script src="https://cdn.jsdelivr.net/npm/vue"></script>

<script>
    export default {
        props:[
            'color',
            'user',
            'time'
        ],
        computed:{
            className(){
                return 'list-group-item-'+this.color;
            }
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
