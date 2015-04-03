<%@ WebHandler Language="C#" Class="bfxm" %>

using System;
using System.Web;
using System.Web.Helpers;
using System.Collections.Generic;
using System.IO;

public class bfxm : IHttpHandler
{

    public void ProcessRequest(HttpContext context)
    {
        var _req = context.Request;
        var _res = context.Response;

        if (_req.HttpMethod != "POST")
        {
            _res.Write(string.Format("Method Not Allowed ({0})", _req.HttpMethod));
            return;
        }
        var _step = _req.Form["step"] ?? "1";
        var _uuid = _req.Form["uuid"];
        var _caller = _req.Form["caller"];
        var _callee = _req.Form["callee"];
        var _returnvar = _req.Form["returnvar"];

        _res.ContentType = "application/json";

        if (_uuid == null || _caller == null || _callee == null)
        {
            _res.Write(Json.Encode(new { error = "parameter missing." }));
            return;
        }
        if (_step == "1")
        {
            var _resp = new
            {
                bfml = new { version = 1 },
                seq = new List<object> {
                        new { action = "play", args = new { url = "http://bfxmdemo.bulutfon.com/demosesler/demo-hosgeldiniz.mp3" } },
                        new {
                            action = "gather",
                            args = new 
                            {
                                min_digits = 1,
                                max_digits = 1,
                                max_attempts = 3,
                                ask = "http://bfxmdemo.bulutfon.com/demosesler/numara-tuslayiniz.mp3",
                                play_on_error = "http://bfxmdemo.bulutfon.com/demosesler/hatali-giris.mp3",
                                variable_name = "returnvar"
                            }
                        }
                    }
            };
            _res.Write(Json.Encode(_resp));
        }
        else if (_step == "2")
        {
            var _resp = new
            {
                bfml = new { version = 1 },
                seq = new List<object> {
                    new { action = "play", args = new { url = "http://bfxmdemo.bulutfon.com/demosesler/tesekkurler.mp3" } },
                    new { action = "hangup"}
                }
            };
            _res.Write(Json.Encode(_resp));
            File.WriteAllText(Path.Combine(HttpRuntime.AppDomainAppPath, "call_log.txt"), string.Format("Son arayan {0} {1} tuşladı.", _caller, _returnvar));
        }
    }

    public bool IsReusable
    {
        get
        {
            return false;
        }
    }

}
