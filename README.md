# 四種 Mapping Strategies

## 部署

```
php artisan migrate
```

```
php artisan db:seed --class=AccountSeeder
```

```
php artisan serve
```


## 測試


[No Mapping](localhost:8000/api/no-mapping?fromAccountId=1&toAccountId=2&amount=1)

[Two Way Mapping](localhost:8000/api/two-way-mapping?fromAccountId=1&toAccountId=2&amount=1)

[Full Mapping](localhost:8000/api/full-mapping?fromAccountId=1&toAccountId=2&amount=1)

[One Way Mapping](localhost:8000/api/one-way-mapping?fromAccountId=1&toAccountId=2&amount=1)
