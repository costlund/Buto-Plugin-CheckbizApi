# Buto-Plugin-CheckbizApi
- Get api data from Checkbiz.se.

## Calls

### get_personalinformation
```
wfPlugin::includeonce('checkbiz/api');
$checkbiz_api = new PluginCheckbizApi();
$checkbiz_api->token = '(token provided by Checkbiz)';
wfHelp::print($checkbiz_api->get_personalinformation('a swedish pid'));
```

### Example data
```
/plugin/checkbiz/api/data/personinformation_example.yml
```

### Settings
```
plugin:
  checkbiz:
    api:
      settings:
        token: 'yml:/../buto_data/theme/[theme]/checkbiz.yml'
```
In file.
```
token: my_token
```
