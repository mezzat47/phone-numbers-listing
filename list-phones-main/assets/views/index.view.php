<!DOCTYPE html>
<html>
    <head>
        <title>List & Categorize - Phone Numbers</title>

    </head>

    <body>
        <div class="container-fluid">
            <h1>Customers Phone Numbers</h1>
            
            <form method="GET" action="/">
                <div class="row">
                    <div class="col">
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Select Country</label>
                            <div class="col-sm-8">
                                <select class="form-control" name="country">
                                    <option value="">Select...</option>
                                    <option value="Morocco">Morocco</option>
                                    <option value="Mozambique">Mozambique</option>
                                    <option value="Uganda">Uganda</option>
                                    <option value="Ethiopia">Ethiopia</option>
                                    <option value="Cameroon">Cameroon</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Phone State</label>
                            <div class="col-sm-8">
                                <select class="form-control" name="state">
                                    <option value="">Select...</option>
                                    <option value="true">Valid</option>
                                    <option value="false">Invalid</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <button type="submit" class="btn btn-primary">Filter</button>
                    </div>
                </div>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Country</th>
                            <th scope="col">State</th>
                            <th scope="col">Country code</th>
                            <th scope="col">Phone number</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach($phones as $phone) : ?>
                        <tr>
                            <td><?= $phone['country'] ?></td>
                            <td><?= $phone['state'] == "true" ? 'OK' : 'NOK' ?></td>
                            <td><?= $phone['code'] ?></td>
                            <td><?= $phone['number'] ?></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </form>
        </div>

    </body>
</html>