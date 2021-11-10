<template>
    <div class="p-5">
        <h1>User dashboard</h1>
        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Architecto ad
        ducimus aspernatur praesentium fugit eligendi optio. Laborum
        voluptatibus accusamus, quo vitae odit architecto hic quam sunt porro
        iste alias illo.
    </div>
</template>

<script>
export default {
    data() {
        return {};
    },
    mounted() {
        this.isAuthorized();
    },
    methods: {
        isAuthorized() {
            if (!this.$store.state.auth_token) {
                this.$router.push("/login");
            }
        },
    },
};
</script>
