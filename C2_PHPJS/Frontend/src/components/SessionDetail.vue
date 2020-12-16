<template>
    <div class='session-detail'>
        <h1 class="title">{{session.title}}</h1>
        <p>{{session.description}}</p>
        <table class="table">
            <tr>
                <td>Speaker</td>
                <td>{{session.speaker}}</td>
            </tr>
            <tr>
                <td>Start</td>
                <td>{{session.start}}</td>
            </tr>
            <tr>
                <td>End</td>
                <td>{{session.end}}</td>
            </tr>
            <tr>
                <td>Cost</td>
                <td>{{session.cost}}</td>
            </tr>
        </table>
    </div>
</template>
<script>
export default {
    props: {
        session: Object
    }
}
</script>
<style lang="scss">
.session-detail {
    position: absolute;
    left: 50%;
    top: 50px;
    transform: translateX(-50%);
    background-color: #fff;
    padding: 50px;
    border: 1px solid #ccc;
    width:100%;
    max-width: 1320px;
    .title {
        margin-bottom: 1rem;
    }
    p {
        font-size: 1.2rem;
    }
    .table {
        border-collapse: collapse;
        width: 100%;
        margin-top: 1rem;
        tr td {
            padding: 1rem;
            border: 1px solid #eee;

        }
    }
}
</style>