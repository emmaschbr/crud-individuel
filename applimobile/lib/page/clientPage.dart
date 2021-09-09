import 'dart:convert';

import 'package:flutter/material.dart';
import 'datatableinvoice.dart';
import 'package:http/http.dart' as http;
import '../models/clientModel.dart';
import '../env_var.dart';


class ClientScreen extends StatefulWidget {
  @override
  ClientPage createState() => ClientPage();

}

// stores ExpansionPanel state information
class PanelItem {
  PanelItem({
    required this.expandedValue,
    required this.headerValue,
    this.isExpanded = false,
  });

  Object expandedValue;
  String headerValue;
  bool isExpanded;
  String ClientName='';
}

List<PanelItem> generateItems(int numberOfItems) {
  return List<PanelItem>.generate(numberOfItems, (int index) {
    return PanelItem(
      headerValue: 'Client $index',
      expandedValue: Tabledefacture(),

    );
  });
}

class ClientPage extends State<ClientScreen> {
  final List<PanelItem> _data = generateItems(6);

  Future<List<Client>>? clients;
  final studentListKey = GlobalKey<ClientPage>();
  final url = Uri.parse('./xampp/htdocs/fact2PDF/model/clientModel.php');

  @override
  void initState() {
    super.initState();
    clients = getClientList();
  }

  Future<List<Client>> getClientList() async {
    final response = await http.get(url);
    print(response);
    final items = json.decode(response.body).cast<Map<String, dynamic>>();
    print(response.body);
    List<Client> clients = items.map<Client>((json) {
      return Client.fromJson(json);
    }).toList();
    print(clients);
    return clients;
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
        key: studentListKey,
        body: Column(
          children: [
            Padding(padding: EdgeInsets.fromLTRB(20, 20, 20, 20),
                child: Text('Clients', style: TextStyle(fontSize: 20, fontWeight: FontWeight.bold))
            ),
            _buildPanel(),
          ],
        )
    );
  }

  Widget _buildPanel() {
    return ExpansionPanelList(
      expansionCallback: (int index, bool isExpanded) {
        setState(() {
          _data[index].isExpanded = !isExpanded;
        });
      },
      children: _data.map<ExpansionPanel>((PanelItem item) {
        return ExpansionPanel(
          headerBuilder: (BuildContext context, bool isExpanded) {
            return ListTile(
              title: Text(item.headerValue),
            );
          },
          body: Container(
              child: Tabledefacture()

          )
          ,
          isExpanded: item.isExpanded,
        );
      }).toList(),
    );
  }
}
void IntitCLientName (int index, String ClientName)
 {
   switch(index) {
     case 1:
       ClientName = '';
   }

}
