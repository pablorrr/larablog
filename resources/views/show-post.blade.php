<div class="container-fluid">

    <!-- Page Heading -->
    <div class="card shadow mb-4">
        <!-- todo: dodoacprzycisk edycji!!!usera , doddac rowniez pole rolei rowniez  dac do edycji-->

        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">show post</h6>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead class="thead-dark">
                <tr>

                    <th scope="col">title</th>
                    <th scope="col">content</th>
                </tr>
                </thead>
                <tbody>
                <tr>

                    <td>{{$blog->title}}</td>
                    <td>{{$blog->content}}</td>

                </tr>
                </tbody>
            </table>
        </div>

    </div>
</div>
