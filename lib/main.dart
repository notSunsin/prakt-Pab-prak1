import 'package:flutter/cupertino.dart';
import 'package:flutter/material.dart';

void main() {
  runApp(MyApp());
}

class MyApp extends StatelessWidget {
  // This widget is the root of your application.
  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      debugShowCheckedModeBanner: false,
      title: 'Project 1',
      theme: ThemeData(
        primarySwatch: Colors.blue,
        visualDensity: VisualDensity.adaptivePlatformDensity,
      ),
      home: MyHomePage(),
    );
  }
}

class MyHomePage extends StatelessWidget {
  @override
  Widget build(BuildContext context) {
    return Scaffold(
        backgroundColor: Colors.white,
        body: Container(
          child: Column(
            mainAxisAlignment: MainAxisAlignment.center,
            children: <Widget>[
              Text(
                "Muhammad Rizky H",
                style: TextStyle(
                  fontFamily: 'Sacramento',
                  fontSize: 20,
                  fontWeight: FontWeight.bold,
                ),
              ),
              SizedBox(
                height: 2,
              ),
              Text(
                "1462300237",
                style: TextStyle(fontSize: 15, fontFamily: 'EBGaramond'),
              ),
              SizedBox(
                height: 10,
                width: 150,
                child: Divider(
                  thickness: 1,
                  color: Colors.black,
                ),
              ),
              Card(
                margin: EdgeInsets.symmetric(horizontal: 35, vertical: 35),
                color: const Color.fromARGB(255, 160, 223, 228),
                child: ListTile(
                  leading: Icon(Icons.local_hospital),
                  title: Text('Dokter Umum'),
                ),
              ),
              Card(
                margin: EdgeInsets.symmetric(horizontal: 35, vertical: 35),
              color: const Color.fromARGB(255, 160, 223, 228),
                child: ListTile(
                  leading: Icon(Icons.child_care),
                  title: Text('Dokter Anak'),
                ),
              ),
                Card(
                margin: EdgeInsets.symmetric(horizontal: 35, vertical: 35),
              color: const Color.fromARGB(255, 160, 223, 228),
                child: ListTile(
                  leading: Icon(Icons.monitor_heart),
                  title: Text('Dokter Hewan'),
                ),
              )
            ],
          ),
        ));
  }
}