# 这是一份php框架当中常见的几种设计模式demo
1.chain 命令链模式\<br>
操作类将运行载入类的固定方法，如果你的短信网关，邮件网关，微信推送网关都持有着这样一个同名的启动方法，
那么就多了\<br>
2.factory 工厂模式\<br>
有时候真的很难决定用用第几号员工来干活，于是我写了一个工厂方法，只要传入这个员工的id，他就来了。
3.observer 观察者模式\<br>
小偷和醉驾的都不想遇见警察，于是他们雇佣了一个观察者。当观察者观察到特定的警察时，会提醒雇主跑路！\<br>
4.singleTon 单点（单例，单元素）模式\<br>
初始化很多数据库连接真的很浪费啊\<br>
5.策略模式\<br>
用户提交支付请求的时候他可能是建行的卡，也可能是工行的卡。而我为了要快速开发，把工行和建行的网关开发代码交给了两个人，
他们都向我暴露一个pay方法，我就能方便的想相应的网关提交支付请求了，真好。\<br>
