</div>
</div>

</body>
<!-- <script src="./assets/mqtt/paho.js"></script> -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/paho-mqtt/1.0.1/mqttws31.js" type="text/javascript"></script> -->
<!-- <script src="./assets/mqtt/mqtt.js"></script> -->
<!-- <script src="https://unpkg.com/mqtt/dist/mqtt.min.js"></script> -->
<!-- <script>
    const mqtt = require('mqtt')
    const options = {
        // Clean session
        clean: true,
        connectTimeout: 4000,
        // Auth
        clientId: 'kelompok-5-32894327894732894329042',
        username: '',
        password: '',
    }
    const client  = mqtt.connect('mqtt://broker.hivemq.com:1883', options)
    client.on('connect', function () {
        console.log('Connected')
        client.subscribe('tests', function (err) {
            if (!err) {
                client.publish('test', 'Hello mqtt')
            }
        })
    })

    client.on('message', function (topic, message) {
        // message is Buffer
        console.log(message.toString())
        client.end()
    })

</script> -->

</html>