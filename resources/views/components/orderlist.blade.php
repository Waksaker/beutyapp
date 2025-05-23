<style>
    td.action-cell {
        text-align: center;
        vertical-align: middle;
        display: flex;           /* Tambah ini */
        justify-content: center; /* Tengah secara horizontal */
        align-items: center;     /* Tengah secara vertical */
        gap: 10px;               /* Jarak antara butang */
    }

    table.dataTable tbody tr {
        background-color: white !important;
    }

    /* Untuk table responsive */
    .table-responsive {
        overflow-x: auto;
        -webkit-overflow-scrolling: touch;
    }
</style>
<div class="mt-3" align="right">
    <a href="{{ route('invoiceallorder', ['name' => $name, 'bulan' => $bulan]) }}" target="_blank" class="btn btn-primary">Print All</a>
    <a href="#" class="btn btn-warning" onclick="deleteallorder('{{ route('deleteallorder', ['name' => $name, 'bulan' => $bulan]) }}')">Delete All</a>
</div>
<br>
<div class="row">
    <div class="col-12">
        <div style="overflow-x: auto;">
            <table id="example" class="table">
                <thead>
                    <tr>
                        <th style="text-align: center;">No</th>
                        <th style="text-align: center;">Information Order</th>
                        <th style="text-align: center;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($itemorder as $key => $itemorders)
                        <tr>
                            <td style="text-align: center; vertical-align: middle;">{{ $key + 1 }}</td>
                            <td>
                                <div style="min-width: 400px;">
                                    <strong>Name:</strong> {{ $itemorders->name ?? '-' }}<br>    
                                    <strong>Date:</strong> {{ \Carbon\Carbon::parse($itemorders->date)->format('j/n/Y') ?? '-' }}<br> 
                                    <strong>Item:</strong> {{ $itemorders->item ?? '-' }}<br>    
                                    <strong>Price:</strong> {{ $itemorders->price ?? '-' }}<br>    
                                    <strong>Quantity:</strong> {{ $itemorders->quantity ?? '-' }}<br>    
                                    <strong>Amounts:</strong> {{ $itemorders->amount ?? '-' }}<br>    
                                </div>
                            </td>
                            <td class="action-cell">
                                <a href="{{ route('invoiceorder', ['name' => $itemorders->name, 'date' => $itemorders->date, 'item' => $itemorders->item]) }}" class="btn btn-primary" target="_blank">
                                    <img src="{{ asset('assets/images/print.png') }}" alt="" style="width: 24px; height: 24;">
                                </a>
                                <a href="" class="btn btn-primary"><img src="{{ asset('assets/images/Pencil.png') }}" alt="" style="width: 24px; height: 24;"></a>
                                <a href="#" class="btn btn-danger" onclick="confirmDelete('{{ route('deleteorder', ['name' => $itemorders->name, 'date' => $itemorders->date, 'item' => $itemorders->item]) }}')">
                                    <img src="{{ asset('assets/images/Trash_Can.png') }}" alt="" style="width: 24px; height: 24;">
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#example').DataTable({
            scrollX: true,   // Enable horizontal scrolling
            autoWidth: false // Prevent automatic width limitation
        });

        console.log("DataTable Columns:", table.columns().header().toArray());
        console.log("DataTable Rows Count:", table.rows().count());
    });
</script>
<script>
    function confirmDelete(url) {
        Swal.fire({
            title: 'Are you sure?',
            text: "Do you really want to delete this order?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = url;
            }
        });
    }
</script>
<script>
    function deleteallorder(url) {
        Swal.fire({
            title: 'Are you sure?',
            text: "This action will delete all invoices for this month. This action cannot be undone.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = url;
            }
        });
    }
</script>