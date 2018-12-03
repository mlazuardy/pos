<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-default">
                    <div class="card-header">Example Component</div>

                    <div class="card-body">
                        I'm an example component.
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            axios.get('/api/products',{
                headers:{
                    'Accept':'application/json',
                    'Authorization':'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjQwODc0YTgyYTUxYjU1OTNkNDY4MGJlYWQ2NmU0NzQ3MzBjYTBkNjcyYmM1NDI1OGJlYjYxNDBmNTMwMTI2NWJlODNmODQ2M2ExYzEwMTA2In0.eyJhdWQiOiIxIiwianRpIjoiNDA4NzRhODJhNTFiNTU5M2Q0NjgwYmVhZDY2ZTQ3NDczMGNhMGQ2NzJiYzU0MjU4YmViNjE0MGY1MzAxMjY1YmU4M2Y4NDYzYTFjMTAxMDYiLCJpYXQiOjE1NDM4MTg1MzcsIm5iZiI6MTU0MzgxODUzNywiZXhwIjoxNTc1MzU0NTM3LCJzdWIiOiIyIiwic2NvcGVzIjpbXX0.ox1xFmMjA6tBHc2XFXvoYTaKc9wNqEQj2sj4aIc96Um6Xqlbsus6dR2GXa39xDPwhejqZqB9H6FdUJkxrb53vTaSh0BoST1XyYgSbabHx5zRxzSmukxTKgNOUuIxgSzHbYJUpE3iw6iu0yJ6DOGvfZep3Lv6yOeY6DFET0XK_pwoxyiESbaDhllbFyeANCYYy1wUQl4fKei4dW1LojaRVyeJuNXGPG9vMuQWs-6UXYnZEjBBvwFFhgmvrZxKvbeE4zB-HUD0nrTd_zi0lPPX96kyfOMYbv9W0ivVEZppI8WIP247AMxoV5Sg4ljH8Dwt8aIXD0hr0us7mj3S_QknzGyh6v_RvYnhI-93PM_r9eA124LFegn6OFo0wTT2d_EYDS2NmDsi8cg_KT-iKsj25-udiBNCRgGb5ABhNtua5do5WnwMpAAk2E1DJ7ztAm5kSTyLItfA_DIpBmxFEZ8CzhEEw4fqj4yMLpT5u6O_1HlS2IWswSO3YZ3XG66yy7hU637f_MKP3kyyXS64zslRmC2h8sJfpQMiEVuQTlh650xbJRd7FFRT8d1WV-IZxkti3PlZFz8jw62O4Xu9WYZ3R0pXSeMcNZCfoQrQlknO4VkrAmVt2tBxXs-NFdE-Eu1-DHRtakSMGIrd2a3tUmkRGiDkUqlGqQCUoODJcasvTsE'
                }
            })
    .then(response => {
        console.log(response.data);
    });
        }
    }
</script>
