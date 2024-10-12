
<head>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
    <style>
        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes zoomIn {
            from {
                opacity: 0;
                transform: scale(0.8);
            }
            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        tr:hover {
            background-color: #f2f2f2 !important;
        }

        .table-responsive {
            animation: fadeIn 1s;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.min.js"></script>
</head>
<div class="container my-5">
    <h1 class="text-center mb-4" style="font-weight: bold; color: #007BFF; animation: fadeInDown 1s;">User Messages</h1>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert" style="animation: fadeIn 1s;">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if($contacts->isEmpty())
        <div class="alert alert-info text-center" style="animation: fadeIn 1s;">
            No messages found.
        </div>
    @else
        <div class="card shadow-sm" style="border-radius: 15px; overflow: hidden; animation: zoomIn 0.8s;">
            <div class="card-body" style="background: linear-gradient(to right, #007BFF, #00C6FF);">
                <table class="table table-hover table-responsive" style="background-color: #fff; border-radius: 15px;">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Message</th>
                            <th scope="col">Received At</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($contacts as $contact)
                            <tr style="transition: background-color 0.3s ease;">
                                <td>{{ $contact->name }}</td>
                                <td>{{ $contact->email }}</td>
                                <td>{{ $contact->message }}</td>
                                <td>{{ $contact->created_at->format('Y-m-d H:i') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
</div>

<!-- إضافة بعض الأنيميشن باستخدام CSS -->
{{-- <style>
    @keyframes fadeIn {
        from {
            opacity: 0;
        }
        to {
            opacity: 1;
        }
    }

    @keyframes fadeInDown {
        from {
            opacity: 0;
            transform: translateY(-20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes zoomIn {
        from {
            opacity: 0;
            transform: scale(0.8);
        }
        to {
            opacity: 1;
            transform: scale(1);
        }
    }

    tr:hover {
        background-color: #f2f2f2 !important;
    }

    .table-responsive {
        animation: fadeIn 1s;
    }
</style> --}}
