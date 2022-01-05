<template>
    <div>
        <div
            @click="nodeClicked"
            :style="{'margin-left': `${depth * 20}px`}"
            class="node">
            {{node.name}}
            <span v-if="hasChildren" class="type">{{expanded ? '&#x25BC;' : '&#9658;'}}</span>
        </div>
        <tree-item-cat v-if="expanded"
                   v-for="(child, index) in node.children"
                   :key="index"
                   :node="child"
                   :depth="depth + 1"
                   @onClick="(node) => $emit('onClick', node)"
        ></tree-item-cat>
    </div>
</template>

<script>
    export default {
        name: 'tree-item-cat',
        props: {
            node: Object,
            depth: {
                type: Number,
                default: 0,
            }
        },
        data() {
            return {
                expanded: false
            }
        },
        methods: {
            nodeClicked() {
                this.expanded = !this.expanded;
                if(!this.hasChildren) {
                    this.$emit('onClick', this.node);
                }
            }
        },
        computed: {
            hasChildren() {
                return this.node.children;
            }
        }
    }
</script>

<style scoped>
.node {
    text-align: left;
}
</style>
