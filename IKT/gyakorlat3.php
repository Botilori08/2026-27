<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>gyak3</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>

    <style>

    </style>
</head>
<body class="bg-dark">
    <div class="container">
        <div class="col-lg-12 bg-secondary text-center p-3 mt-2 rounded-4">
            <img src="./sytem.png" alt="">
        </div>
        <div class="col-lg-12 bg-secondary mt-4 rounded-4 text-white">
            <pre>
            1: lo: <LOOPBACK,UP,LOWER_UP> mtu 65536 qdisc noqueue state UNKNOWN group default qlen 1000
                link/loopback 00:00:00:00:00:00 brd 00:00:00:00:00:00
                inet 127.0.0.1/8 scope host lo
                    valid_lft forever preferred_lft forever
                inet6 ::1/128 scope host noprefixroute 
                    valid_lft forever preferred_lft forever
            2: enp0s3: <BROADCAST,MULTICAST,UP,LOWER_UP> mtu 1500 qdisc fq_codel state UP group default qlen 1000
                link/ether 08:00:27:b8:fa:f0 brd ff:ff:ff:ff:ff:ff
                altname enx080027b8faf0
                inet 172.16.20.10/16 brd 172.16.255.255 scope global enp0s3
                    valid_lft forever preferred_lft forever
                inet6 fe80::a00:27ff:feb8:faf0/64 scope link proto kernel_ll 
                    valid_lft forever preferred_lft forever

            </pre>
        </div>
        <div class="col-lg-12 bg-secondary mt-3 rounded-4 text-white pt-4">
            <pre>
            loru     sshd pts/0   2026-09-17 09:58 (172.16.0.171)
            loru     seat0        2026-09-17 09:58
            loru     tty1         2026-09-17 09:58
            </pre>
        </div>
        <div class="col-lg-12 bg-secondary mt-3 rounded-4 text-white pt-4 text-center shadow mb-5 pb-3">
            <span>Az Ön kliensének IP címe</span><br>
            <h2 class="text-info f"><?php echo $_SERVER["REMOTE_ADDR"]?></h2>
        </div>


        
    </div>
</body>
</html>