<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xác nhận mua hàng</title>
    <!-- Link Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 400px;
            text-align: center;
        }

        .header {
            color: #333;
            border-bottom: 1px solid #ddd;
            padding-bottom: 10px;
        }

        .info {
            margin-top: 20px;
            text-align: left;
        }

        .success-message {
            background-color: #007bff;
            color: #fff;
            padding: 10px;
            border-radius: 4px;
            margin-top: 20px;
        }

        .footer {
            margin-top: 20px;
            text-align: right;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="header">Xác nhận mua hàng</h2>
        @foreach ($prs as $pr)
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Mã SP:</th>
      <th scope="col">Tên:</th>
      <th scope="col">Số lượng:</th>
      <th scope="col">Đơn giá:</th>
      <th scope="col">Tổng tiền:</th>
    </tr>
  </thead>
  <tbody>
    <tr>
       <td scope="row">#{{ $pr->id }}</td>
       <td scope="row">{{ $pr->product->name }}</td>
       <td scope="row">{{ $pr->quantity }}</td>
      <td scope="row">${{ $pr->price }}</td>
      <td scope="row">${{ $pr->price * $pr->quantity }}</td>
    </tr>
  </tbody>
</table>
@endforeach
        <div class="success-message">{{ $success }}</div>

        <p class="info">Nếu bạn không thực hiện yêu cầu này, vui lòng bỏ qua email này.</p>

        <div class="footer">
            <p>Trân trọng,</p>
            <p>Đội ngũ hỗ trợ của chúng tôi</p>
        </div>
    </div>

    <!-- Link Bootstrap JS and Popper.js (if needed) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
